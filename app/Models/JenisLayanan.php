<?php

namespace App\Models;

use App\View\Components\Viho\Form\InputText;
use App\View\Components\Viho\Form\TextArea;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLayanan extends MainModel
{
    use HasFactory;

    protected $fillable = [
        'jenis_layanan','deskripsi_jenis_layanan','uuid'
    ];

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    public static $columns = [
        ['field'=>'jenis_layanan','title'=>'Jenis Layanan'],
        ['field'=>'deskripsi_jenis_layanan','title'=>'Deskripsi Jenis Layanan'],
    ];

    public static $formFields = [
        'id'=>['field'=>'id','type'=>InputHidden::class],
        'uuid'=>['field'=>'uuid','type'=>InputHidden::class],
        'jenis_layanan'=>['field'=>'jenis_layanan','title'=>'Jenis Layanan','type'=>InputText::class],
        'deskripsi_jenis_layanan'=>['field'=>'deskripsi_jenis_layanan','title'=>'Deskripsi Jenis Layanan','type'=>TextArea::class],

    ];

    public function syarat_jenis_layanan(){
        return $this->hasMany(SyaratJenisLayanan::class);
    }
}
