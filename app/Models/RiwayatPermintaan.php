<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPermintaan extends Model
{
    use HasFactory;

    protected $fillable = [
    'status_permintaan_id','petugas_id','catatan_petugas'
    ];
}
