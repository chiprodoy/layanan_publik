<?php

namespace App\Http\Controllers;

use App\Models\PermintaanLayanan;
use App\Http\Requests\StorePermintaanLayananRequest;
use App\Http\Requests\UpdatePermintaanLayananRequest;
use App\Models\JenisLayanan;
use App\Models\RiwayatPermintaan;
use App\Models\Role;
use App\Models\RoleName;
use App\Models\StatusPermintaan;
use App\Models\SyaratJenisLayanan;
use App\Models\TipePersyaratan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use MF\Controllers\Page;
use MF\Controllers\ResponseCode;


class PermintaanLayananController extends BackendController
{
    public $modelRecords=PermintaanLayanan::class;
    public $extData;

    public $indexURL='permintaan_layanan.index';
    public $editURL='permintaan_layanan.edit/{uuid}';
    public $deleteURL='permintaan_layanan.destroy';
    public $createURL='permintaan_layanan.create';
    public $storeURL='permintaan_layanan.store';
    public $showURL='permintaan_layanan.show';
    public $updateURL='permintaan_layanan.update';
    public $titleOfCreatePage='Buat Permintaan Baru';
    public $titleOfShowPage='Detail Permintaan Layanan';
    public $titleOfEditPage='Edit Permintaan Layanan';
    public $titleOfIndexPage='Permintaan Layanan';
    public $modName='permintaan_layanan';
    public $CURRENT_PAGE;
    public $jenisLayanan;
    public $syaratJenisLayanan;
    public $statusPermintaan=[];
    public $berkasPermintaan;
    public $permintaanLayanan;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePermintaanLayananRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermintaanLayananRequest $request)
    {
        return parent::insertRecord($request);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePermintaanLayananRequest  $request
     * @param  \App\Models\PermintaanLayanan  $permintaanLayanan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermintaanLayananRequest $request, $id)
    {
        return parent::updateRecord($request,$id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePermintaanLayananRequest  $request
     * @param  \App\Models\PermintaanLayanan  $permintaanLayanan
     * @return \Illuminate\Http\Response
     */
    public function browse(Request $request,$idJenisLayanan)
    {
        $this->jenisLayanan=JenisLayanan::find($idJenisLayanan);
        $this->CURRENT_PAGE=new Page($this->titleOfIndexPage,route($this->indexURL));

        $this->editURL='permintaan.edit/{uuid}';
        $this->deleteURL='permintaan.destroy';
        $this->createURL=route('permintaan.create',$this->jenisLayanan->id);
        $this->showURL='permintaan.show/{uuid}';

        $this->titleOfIndexPage='Permintaan Layanan '.$this->jenisLayanan->jenis_layanan;

        $this->setBreadCrumb();
        if(Auth::user()->isRole(RoleName::PENGGUNA)){
            $this->extData=PermintaanLayanan::where('pemohon_id',Auth::user()->id)
                            ->where('jenis_layanan_id',$idJenisLayanan)->get();
        }elseif(Auth::user()->isRole(RoleName::OP_KELURAHAN)){
            $this->extData=PermintaanLayanan::where('jenis_layanan_id',$idJenisLayanan)
                            ->whereIn('status_permintaan_id',[StatusPermintaan::BARU,StatusPermintaan::SEDANG_VERIFIKASI_KELURAHAN])
                            ->get();
        }elseif(Auth::user()->isRole(RoleName::OP_KECAMATAN)){
            $this->extData=PermintaanLayanan::where('jenis_layanan_id',$idJenisLayanan)
                            ->whereIn('status_permintaan_id',[StatusPermintaan::SEDANG_VERIFIKASI_KECAMATAN,StatusPermintaan::SELESAI_VERIFIKASI_KELURAHAN])
                            ->get();
        }elseif(Auth::user()->isRole(RoleName::OP_KABUPATEN)){
            $this->extData=PermintaanLayanan::where('jenis_layanan_id',$idJenisLayanan)
                            ->whereIn('status_permintaan_id',[StatusPermintaan::SELESAI_VERIFIKASI_KECAMATAN,StatusPermintaan::SEDANG_DIPROSES,StatusPermintaan::SELESAI])
                            ->get();
        }

        if(view()->exists('admin.'.$this->modName.'.crud.index')){
            return view('admin.'.$this->modName.'.crud.index',get_object_vars($this));
        }else{
            return view($this->viewNameOfIndexPage,get_object_vars($this));
        }
    }

       /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePermintaanLayananRequest  $request
     * @param  \App\Models\PermintaanLayanan  $permintaanLayanan
     * @return \Illuminate\Http\Response
     */
    public function browseCreate($idJenisLayanan)
    {
        $this->jenisLayanan=JenisLayanan::find($idJenisLayanan);
        $this->storeURL='permintaan.store';

        if($this->jenisLayanan){

            //$this->syaratJenisLayanan=SyaratJenisLayanan::where('jenis_layanan_id',$this->jenisLayanan->id)->get();

            $this->CURRENT_PAGE=new Page($this->titleOfCreatePage,route($this->createURL));
            $this->setBreadCrumb();
            if(view()->exists('admin.'.$this->modName.'.crud.create')){
                return view('admin.'.$this->modName.'.crud.create',get_object_vars($this));
            }else{
                return view($this->viewNameOfCreatePage,get_object_vars($this));
            }
        }else{
            return response()->noContent();
        }

    }
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function browseStore(StorePermintaanLayananRequest $request,$id)
    {

        $cat=JenisLayanan::find($id);
        $syarat=SyaratJenisLayanan::where('jenis_layanan_id',$id)->get();
        $this->createURL=route('permintaan.create',$cat->id);
        $param=[];
        foreach($syarat as $k =>$v){
            if($v->tipe_persyaratan==TipePersyaratan::InputFile){
                $path=$request->berkas[$v->nama_persyaratan]->store('berkas','public');
            }
            $param[$k]=[
                'nama_persyaratan'=>$v->nama_persyaratan,
                'label_persyaratan'=>$v->label_persyaratan,
                'tipe_persyaratan'=>$v->tipe_persyaratan,
                'berkas'=>$path,
                'uuid'=>'-'
            ];
        }

        parent::insertRecord($request);
        $this->createResult->berkas_permintaan_layanan()->createMany($param);
        return $this->output('success',$request,'Data Berhasil Disimpan',$this->createURL);

    }

    public function browseShow($uid)
    {
        $this->permintaanLayanan=PermintaanLayanan::where('uuid',$uid)->first();
        $this->jenisLayanan=$this->permintaanLayanan->jenis_layanan;

        if(Auth::user()->isRole(RoleName::SUPERADMIN)){
            $this->statusPermintaan=[
                ['value'=>2,'label'=>'SEDANG VERIFIKASI KELURAHAN'],
                ['value'=>3,'label'=>'SELESAI VERIFIKASI KELURAHAN'],
                ['value'=>4,'label'=>'DITOLAK KELURAHAN'],
                ['value'=>5,'label'=>'SEDANG VERIFIKASI KECAMATAN'],
                ['value'=>6,'label'=>'SELESAI VERIFIKASI KECAMATAN'],
                ['value'=>7,'label'=>'DITOLAK KECAMATAN'],
                ['value'=>8,'label'=>'SEDANG DIPROSES'],
                ['value'=>9,'label'=>'SELESAI']
            ];
        }elseif(Auth::user()->isRole(RoleName::OP_KELURAHAN)){
            $this->statusPermintaan=[
                ['value'=>2,'label'=>'SEDANG VERIFIKASI KELURAHAN'],
                ['value'=>3,'label'=>'SELESAI VERIFIKASI KELURAHAN'],
                ['value'=>4,'label'=>'DITOLAK KELURAHAN'],
            ];
        }elseif(Auth::user()->isRole(RoleName::OP_KECAMATAN)){
            $this->statusPermintaan=[
                ['value'=>5,'label'=>'SEDANG VERIFIKASI KECAMATAN'],
                ['value'=>6,'label'=>'SELESAI VERIFIKASI KECAMATAN'],
                ['value'=>7,'label'=>'DITOLAK KECAMATAN'],
            ];
        }elseif(Auth::user()->isRole(RoleName::OP_KABUPATEN)){
            $this->statusPermintaan=[
                ['value'=>8,'label'=>'SEDANG DIPROSES'],
                ['value'=>9,'label'=>'SELESAI']
            ];
        }

//        $this->modName=strtolower($cat->slugs);
       // $this->updateURL='browse.update/'.$cat->slugs.'/{uuid}/';
       // $this->indexURL='browse.index/'.$cat->slugs;
       // $this->showURL='browse.show/'.$cat->slugs.'/{uuid}/';
        $this->viewNameOfShowPage='admin.permintaan_layanan.crud.show';

        return parent::show($uid);
    }

    public function updateStatus(Request $request,$uid){
        try
        {
           $pl=PermintaanLayanan::where('uuid',$uid)->update(
                    ['status_permintaan_id'=>$request->post('status_permintaan_id')]
                );
            $rec=PermintaanLayanan::where('uuid',$uid)->first();
            $hist=$rec->riwayat_permintaan()->create([
                'status_permintaan_id'=>$request->post('status_permintaan_id'),
                'petugas_id'=>Auth::user()->id,
                'catatan_petugas'=>$request->post('catatan_petugas')
            ]);
            //$record=$this->modelRecords::where('uuid',$uid);
           // $updated=$record->update($this->newData);
           $updated=$pl;

            return $this->iSuccess($updated,$request,route('permintaan.show',$uid),'Data Berhasil Diupdate');
        }
        catch(QueryException $e)
        {
            Log::error($e);
            if(env('APP_DEBUG')) return $this->iError($request,route('permintaan.show',$uid),ResponseCode::ERROR,$e->getMessage());
            else return $this->iError($request,route('permintaan.show',$uid),ResponseCode::ERROR,'Data Gagal Diupdate');

        }
    }
}
