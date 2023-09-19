@extends('layouts.app')
@section('content')
@can('create',$modelRecords)

<div class="card">
    <form method="POST" action="{{ route($storeURL,$jenisLayanan->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="card-header">{{ $CURRENT_PAGE->title }}</div>
        <div class="card-body">
            @if (Session::has('response.message'))
                <x-viho::alert id="alert_notif" class="alert-info">
                    @foreach (Session::get('response') as $item)
                        {{ $item }}
                    @endforeach
                </x-viho::alert>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <input type="hidden" class="form-control" id="nomor_permintaan" name="nomor_permintaan" value="" placeholder="">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="" placeholder="">
            </div>
                                                                 <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="" placeholder="">
            </div>

            <div class="mb-3">
                <label for="nmr_tlpon" class="form-label">Nomor telpon</label>
                <input type="text" class="form-control" id="nmr_tlpon" name="nmr_tlpon" value="" placeholder="">
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="" placeholder="">
            </div>

            <div class="mb-3">
                <label for="catatan" class="form-label">Catatan</label>
                <textarea class="form-control" id="catatan" name="catatan" value="" placeholder=""></textarea>
            </div>

            @include('admin.permintaan_layanan.syarat')

            <input type="hidden" id="staff_id" name="staff_id" value=""/>

            <input type="hidden" id="pemohon_id" name="pemohon_id" value=""/>

            <input type="hidden" id="status_permintaan_id" name="status_permintaan_id" value="1"/>

            <input type="hidden" id="isClosed" name="isClosed" value="0" />

            <input type="hidden" id="jenis_layanan_id" name="jenis_layanan_id" value="{{ $jenisLayanan->id }}" />

            <input type="hidden" id="nomor_permintaan" name="nomor_permintaan" value="" />
            <input type="hidden" id="uuid" name="uuid" value="-" />


        </div>
        <div class="card-footer">
                <div class="col-md-3 offset-md-11">
                    <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                </div>
        </div>
    </form>
</div>


@endcan

@endsection
