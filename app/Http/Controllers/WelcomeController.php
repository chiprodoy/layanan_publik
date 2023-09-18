<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostType;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public $kontak;

    public $currentPage;
    public $layanan;
    public $currentCategory;

    const NEWSCATEGORY=1;
    const ABOUT=2;
    const REGULASI=3;
    const HEADLINE=4;
    const SAMBUTAN=5;
    const FASILITAS=6;
    const PENGUMUMAN=7;




    public function index(){
        $this->currentPage='home';


       // $this->kontak=Post::where('slug','kontak')->first();


        $this->layanan=JenisLayanan::all();

        return view('Welcome.index',get_object_vars($this));
    }

    public function post($slug){
        $this->currentPage='detail';

        $this->kontak=Post::where('slug','kontak')->first();

        $this->postContent=Post::where('slug',$slug)->first();
        $selectedCategories=$this->postContent->categories[0];

        $this->similarPost=Post::take(6)->whereHas('categories',function($query) use($selectedCategories){
            $query->where('name','=',$selectedCategories->name);
        })->get();

        $this->recentPost=Post::take(6)->where('post_type',PostType::BLOG)->orderBy('id','desc')->get();

        if(empty($this->postContent->tags)) $tags=null;
        else $tags=explode(',',$this->postContent->tags);

        return view('Welcome.post',array_merge(get_object_vars($this),compact('tags')));
    }

    public function page($slug){
        $this->contentSejarah=Post::where('slug','sejarah')->first();
        $this->kontak=Post::where('slug','kontak')->first();

        $this->contentProsedurRegulasi=Post::take(6)->whereHas('categories',function($query){
            $query->where('id','=',$this::REGULASI);
        })->get();
        $this->contentBerita=Post::take(9)->whereHas('categories',function($query){
            $query->where('id','=',$this::NEWSCATEGORY);
        })->get();

        return view('welcome',get_object_vars($this));
    }

    public function blog($slug){
        $this->kontak=Post::where('slug','kontak')->first();

        $this->currentCategory=PostCategory::where('slugs',$slug)->first();

        $pc=Post::whereRelation('categories','slugs','=',$slug);
        $this->contentBerita=$pc->simplePaginate(12);
        //$this->updatePostViewCounter($pc->first());
        return view('Welcome.blog',get_object_vars($this));

    }
    //
}
