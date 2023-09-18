<?php

namespace App\Models;

use App\View\Components\Viho\Form\InputText;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PermintaanLayanan extends MainModel
{
    use HasFactory;

    protected $fillable = [
        'nomor_permintaan','nama','email','nmr_tlpon','alamat','catatan',
        //'persyaratan',
        'pemohon_id','staff_id','status_permintaan_id','isClosed','jenis_layanan_id','uuid'
    ];

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    public static $columns = [
        ['field'=>'nomor_permintaan','title'=>'Nomor'],
        ['field'=>'nama','title'=>'Nama'],
        ['field'=>'email','title'=>'Email'],
        ['field'=>'nmr_tlpon','title'=>'Nomor telpon'],
        ['field'=>'alamat','title'=>'Alamat'],
        ['field'=>'status_permintaan_id','title'=>'Status Permintaan'],

    ];

    public static $formFields = [
        'id'=>['field'=>'id','type'=>InputHidden::class],
        'uuid'=>['field'=>'uuid','type'=>InputHidden::class],
        'nomor_permintaan'=>['field'=>'nomor_permintaan','title'=>'Nomor','type'=>InputText::class],
        'nama'=>['field'=>'nama','title'=>'Nama','type'=>InputText::class],
        'email'=>['field'=>'email','title'=>'Email','type'=>InputText::class],
        'nmr_tlpon'=>['field'=>'nmr_tlpon','title'=>'Nomor telpon','type'=>InputText::class],
        'alamat'=>['field'=>'alamat','title'=>'Alamat','type'=>InputText::class],
        'catatan'=>['field'=>'catatan','title'=>'Catatan','type'=>InputText::class],
    //    'persyaratan'=>['field'=>'persyaratan','title'=>'Persyaratan','type'=>InputText::class],
        'staff_id'=>['field'=>'staff_id','title'=>'Petugas','type'=>InputText::class],
        'pemohon_id'=>['field'=>'pemohon_id','title'=>'Pemohon','type'=>InputText::class],
        'status_permintaan_id'=>['field'=>'status_permintaan_id','title'=>'Status Permintaan','type'=>InputText::class],
        'isClosed'=>['field'=>'isClosed','title'=>'Selesai','type'=>InputText::class],
        'jenis_layanan_id'=>['field'=>'jenis_layanan_id','title'=>'Jenis Layanan','type'=>InputText::class],

    ];

    public function jenis_layanan(){
        return $this->belongsTo(JenisLayanan::class);
    }

    public function berkas_permintaan_layanan(){
        return $this->hasMany(BerkasPermintaanLayanan::class);
    }

    public function riwayat_permintaan(){
        return $this->hasMany(RiwayatPermintaan::class);
    }
    /**
     * Set the Post slug
     *
     * @param  string  $value
     * @return void
     */
    public function setNomorPermintaanAttribute($value)
    {
        $no=PermintaanLayanan::count()+1;
        $nmrSurat=str_pad($no,5,"0",STR_PAD_LEFT).'/permohonan/'.date('Y').'/'.date('m');
        $this->attributes['nomor_permintaan'] = $nmrSurat;
    }
        /**
     * Set the Post slug
     *
     * @param  string  $value
     * @return void
     */
    public function setPemohonIdAttribute($value)
    {
        $this->attributes['pemohon_id'] = Auth::user()->id;
    }
}

class StatusPermintaan{
    const BARU=1;
    const SEDANG_VERIFIKASI_KELURAHAN=2; //tampilkan pengajuan baru, tentukan petugas
    const SELESAI_VERIFIKASI_KELURAHAN=3; // lanjut ke kecamatan
    const DITOLAK_KELURAHAN=4;
    const SEDANG_VERIFIKASI_KECAMATAN=5;
    const SELESAI_VERIFIKASI_KECAMATAN=6;
    const DITOLAK_KECAMATAN=7;
    const SEDANG_DIPROSES=8;
    const SELESAI=9; // contoh: selesai ktp bisa diambil

}
