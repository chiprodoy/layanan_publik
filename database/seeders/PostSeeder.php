<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostStatus;
use App\Models\PostType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 20 random news
        Post::factory()
        ->count(20)
        ->create()->each(function($post){
            $post->categories()->attach(1,['user_modify'=>'su']);
        });

        // 20 random pengumuman
        Post::factory()
        ->count(20)
        ->create()->each(function($post){
            $post->categories()->attach(7,['user_modify'=>'su']);
        });

        // sejarah
        $sejarah=Post::create([
            'title'=>'Sejarah',
            'description'=>fake()->paragraphs(3,true),
            'post_status'=> PostStatus::PUBLISH, //publish
            'post_type' => PostType::PAGE, // blog,page,multimedia
            'slug'=>'',
            'uuid'=>'',
            'author'=>'admin'
        ]);

        $sejarah->categories()->attach(2,['user_modify'=>'su']);

        // visi misi
        $visi=Post::create([
            'title'=>'Visi Dan Misi',
            'description'=>fake()->paragraphs(3,true),
             'post_status'=> PostStatus::PUBLISH, //publish
             'post_type' => PostType::PAGE, // blog,page,multimedia
             'slug'=>'',
             'uuid'=>'',
             'author'=>'admin'
        ]);

        $visi->categories()->attach(2,['user_modify'=>'su']);

        // Struktur Organisasi
        $strukturOrganisasi=Post::create([
            'title'=>'Struktur Organisasi',
            'description'=>fake()->paragraphs(3,true),
             'post_status'=> PostStatus::PUBLISH, //publish
             'post_type' => PostType::PAGE, // blog,page,multimedia
             'slug'=>'',
             'uuid'=>'',
             'author'=>'admin'
        ]);

        $strukturOrganisasi->categories()->attach(2,['user_modify'=>'su']);

        // Profil Pendidik
        $nilai=Post::create([
            'title'=>'Profil Pendidik',
            'description'=>fake()->paragraphs(3,true),
             'post_status'=> PostStatus::PUBLISH, //publish
             'post_type' => PostType::PAGE, // blog,page,multimedia
             'slug'=>'',
             'uuid'=>'',
             'author'=>'admin'
        ]);

        $nilai->categories()->attach(2,['user_modify'=>'su']);

        // Profil Siswa & Alumni
        $nilai=Post::create([
            'title'=>'Profil Siswa Dan Alumni',
            'description'=>fake()->paragraphs(3,true),
             'post_status'=> PostStatus::PUBLISH, //publish
             'post_type' => PostType::PAGE, // blog,page,multimedia
             'slug'=>'',
             'uuid'=>'',
             'author'=>'admin'
        ]);

        $nilai->categories()->attach(2,['user_modify'=>'su']);

        // Fasilitas Perpustakaan
        $nilai=Post::create([
            'title'=>'Perpustakaan',
            'description'=>fake()->paragraphs(3,true),
             'post_status'=> PostStatus::PUBLISH, //publish
             'post_type' => PostType::PAGE, // blog,page,multimedia
             'slug'=>'',
             'uuid'=>'',
             'author'=>'admin'
        ]);

        $nilai->categories()->attach(6,['user_modify'=>'su']);

        // Fasilitas BK
        $nilai=Post::create([
            'title'=>'Bimbingan Konseling',
            'description'=>fake()->paragraphs(3,true),
             'post_status'=> PostStatus::PUBLISH, //publish
             'post_type' => PostType::PAGE, // blog,page,multimedia
             'slug'=>'',
             'uuid'=>'',
             'author'=>'admin'
        ]);

        // Fasilitas OSIS
        $nilai=Post::create([
            'title'=>'OSIS Dan MPK',
            'description'=>fake()->paragraphs(3,true),
             'post_status'=> PostStatus::PUBLISH, //publish
             'post_type' => PostType::PAGE, // blog,page,multimedia
             'slug'=>'',
             'uuid'=>'',
             'author'=>'admin'
        ]);

        $nilai->categories()->attach(6,['user_modify'=>'su']);

        // Lapangan Basket
        $nilai=Post::create([
            'title'=>'Lapangan Basket',
            'description'=>fake()->paragraphs(3,true),
             'post_status'=> PostStatus::PUBLISH, //publish
             'post_type' => PostType::PAGE, // blog,page,multimedia
             'slug'=>'',
             'uuid'=>'',
             'author'=>'admin'
        ]);

        $nilai->categories()->attach(6,['user_modify'=>'su']);

        // Laboratrium Fisika
        $nilai=Post::create([
            'title'=>'Laboratrium Fisika',
            'description'=>fake()->paragraphs(3,true),
             'post_status'=> PostStatus::PUBLISH, //publish
             'post_type' => PostType::PAGE, // blog,page,multimedia
             'slug'=>'',
             'uuid'=>'',
             'author'=>'admin'
        ]);

        $nilai->categories()->attach(6,['user_modify'=>'su']);

        // Laboratrium Biologi
        $nilai=Post::create([
            'title'=>'Laboratrium Biologi',
            'description'=>fake()->paragraphs(3,true),
             'post_status'=> PostStatus::PUBLISH, //publish
             'post_type' => PostType::PAGE, // blog,page,multimedia
             'slug'=>'',
             'uuid'=>'',
             'author'=>'admin'
        ]);

        $nilai->categories()->attach(6,['user_modify'=>'su']);

        // Laboratrium Komputer
        $nilai=Post::create([
            'title'=>'Laboratrium Komputer',
            'description'=>fake()->paragraphs(3,true),
             'post_status'=> PostStatus::PUBLISH, //publish
             'post_type' => PostType::PAGE, // blog,page,multimedia
             'slug'=>'',
             'uuid'=>'',
             'author'=>'admin'
        ]);

        $nilai->categories()->attach(6,['user_modify'=>'su']);
        //kontak
        $kontak=Post::create([
            'title'=>'Kontak',
            'description'=>fake()->paragraphs(3,true),
             'post_status'=> PostStatus::PUBLISH, //publish
             'post_type' => PostType::PAGE, // blog,page,multimedia
             'slug'=>'',
             'uuid'=>'',
             'author'=>'admin'
        ]);

        $kontak->categories()->attach(2,['user_modify'=>'su']);

        //sambutan
        $sambutan=Post::create([
            'title'=>'Sambutan Kepala Sekolah SMAN 1 Martapura',
            'description'=>fake()->paragraphs(3,true),
             'post_status'=> PostStatus::PUBLISH, //publish
             'post_type' => PostType::PAGE, // blog,page,multimedia
             'slug'=>'',
             'uuid'=>'',
             'author'=>'admin'
        ]);

        $sambutan->categories()->attach(5,['user_modify'=>'su']);






    }
}
