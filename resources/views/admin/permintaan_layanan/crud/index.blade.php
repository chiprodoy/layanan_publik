@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-lg-6">
          <h3>{{$CURRENT_PAGE->title}}</h3>
        <ol class="breadcrumb">
            @foreach ($BREADCRUMB_ITEM as $bc)
            @if ($CURRENT_PAGE===$bc)
                <li class="breadcrumb-item active">{{ $bc->title }}</li>
            @else
                <li class="breadcrumb-item"><a href="{{$bc->url}}">{{ $bc->title }}</a></li>
            @endif

            @endforeach

          </ol>
        </div>
        <div class="col-lg-6">
            <div class="bookmark">
                @can('create',$modelRecords)
                <span>
                    @if (strpos($createURL,'http')===0)
                        <a class="btn btn-sm btn-outline-secondary" href="{{ $createURL }}">
                            <i class="bi bi-file-earmark-plus-fill"></i> Tambah
                        </a>
                    @else
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route($createURL) }}">
                            <i class="bi bi-file-earmark-plus-fill"></i> Tambah
                        </a>
                    @endif
                </span>
                @endcan
            </div>
        </div>
      </div>
    </div>
</div>
<div class="container-fluid">
    <div class="col-sm-12">
        <div class="card">
            {{-- <div class="card-header">
            </div> --}}
                <div class="card-block row">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            <x-viho::data-table :model="$modelRecords" :extData="$extData" :editButton="$editURL" :showButton="$showURL" :deleteButton="$deleteURL"/>
                        </div>
                    </div>
                </div>

            <div class="card-footer">
                <ul class="pagination justify-content-end pagination-primary pagination-sm">
                    <li class="page-item disabled"><a class="page-link" href="javascript:void(0)" tabindex="-1">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
                    <li class="page-item active">
                        <a class="page-link" href="javascript:void(0)">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">Next</a></li>
                </ul>
           </div>
        </div>

    </div>
</div>
@endsection

