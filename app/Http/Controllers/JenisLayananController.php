<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use App\Http\Requests\StoreJenisLayananRequest;
use App\Http\Requests\UpdateJenisLayananRequest;

class JenisLayananController extends BackendController
{
    public $modelRecords=JenisLayanan::class;
    public $extData;

    public $indexURL='jenis_layanan.index';
    public $editURL='jenis_layanan.edit/{uuid}';
    public $deleteURL='jenis_layanan.destroy';
    public $createURL='jenis_layanan.create';
    public $storeURL='jenis_layanan.store';
//    public $showURL='jenis_layanan.show';
    public $updateURL='jenis_layanan.update';
    public $titleOfCreatePage='Tambah Jenis Layanan';
    public $titleOfShowPage='Detail Jenis Layanan';
    public $titleOfEditPage='Edit Jenis Layanan';
    public $titleOfIndexPage='Jenis Layanan';
    public $modName='jenis_layanan';


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJenisLayananRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJenisLayananRequest $request)
    {
        //
        return parent::insertRecord($request);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenisLayananRequest  $request
     * @param  \App\Models\JenisLayanan  $jenisLayanan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJenisLayananRequest $request, $id)
    {
        //
        return parent::updateRecord($request,$id);

    }


}
