<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasPermintaanLayanan extends MainModel
{
    use HasFactory;

    protected $fillable = [
        'permintaan_layanan_id','nama_persyaratan','label_persyaratan','tipe_persyaratan','berkas','uuid'
    ];


}
