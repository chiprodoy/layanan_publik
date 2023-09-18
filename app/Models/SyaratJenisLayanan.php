<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SyaratJenisLayanan extends MainModel
{
    use HasFactory;

    protected $fillable = [
        'jenis_layanan_id','nama_persyaratan','label_persyaratan','tipe_persyaratan','uuid'
    ];
}

class TipePersyaratan{

    const InputText='InputText';
    const InputFile='InputFile';
}


