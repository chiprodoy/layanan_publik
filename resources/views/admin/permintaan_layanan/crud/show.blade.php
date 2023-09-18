@extends('layouts.app')
@section('content')
@can('create',$modelRecords)

<div class="card">
    <form method="POST" action="{{ route('permintaan.updatestatus',$RECORD->uuid)}}" enctype="multipart/form-data">
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
            {{--  --}}
            <div class="row">
                <div class="col-md-2">Nomor :</div>
                <div class="col-md-3">{{$RECORD->nomor_permintaan}}</div>
            </div>
            <div class="row mb-1">

                <div class="col-md-2">Nama Pemohon:</div>
                <div class="col-md-3">{{$RECORD->nama}}</div>
                <div class="col-md-2">Alamat :</div>
                <div class="col-md-3">{{$RECORD->alamat}}</div>
            </div>
            <div class="row">
                <div class="col-md-2">Email :</div>
                <div class="col-md-3">{{$RECORD->email}}</div>
                <div class="col-md-2">Nomor Telpon :</div>
                <div class="col-md-3">{{$RECORD->nmr_tlpon}}</div>
            </div><hr/>
            <div class="row mb-3">

                <div class="col-md-12">
                   <p> {{ $RECORD->catatan}}</p>
                </div>
            </div>
            {{-- start input --}}
            <input type="hidden" class="form-control" id="nomor_permintaan" name="nomor_permintaan" value="" placeholder="">

            @include('admin.permintaan_layanan.crud.show_syarat_layanan')

            <input type="hidden" id="staff_id" name="staff_id" value=""/>

            <input type="hidden" id="pemohon_id" name="pemohon_id" value=""/>

            <input type="hidden" id="status_permintaan_id" name="status_permintaan_id" value="1"/>

            <input type="hidden" id="isClosed" name="isClosed" value="0" />

            <input type="hidden" id="jenis_layanan_id" name="jenis_layanan_id" value="{{ $jenisLayanan->id }}" />

            <input type="hidden" id="nomor_permintaan" name="nomor_permintaan" value="" />
            <input type="hidden" id="uuid" name="uuid" value="-" />

            <div class="mb-3">
                <label for="catatan" class="form-label">Catatan Petugas</label>
                <textarea class="form-control" id="catatan_petugas" name="catatan_petugas" value="" placeholder=""></textarea>
            </div>
            <div class="mb-3">
                <label for="catatan" class="form-label">Status Permintaan</label>
                <select class="form-control" name="status_permintaan_id" id="status_permintaan_id">
                    @foreach ($statusPermintaan as $item )
                        <option value="{{$item['value']}}">{{$item['label']}}</option>

                    @endforeach
                </select>
            </div>

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
