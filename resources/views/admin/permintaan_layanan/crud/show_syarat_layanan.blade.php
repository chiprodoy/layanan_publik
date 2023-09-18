@foreach ($RECORD->berkas_permintaan_layanan as $item)
<div class="mb-3">
    <label for="catatan" class="form-label">{{$item->label_persyaratan}}</label>
    <a href="{{ url('storage/'.$item->berkas) }}" class="btn btn-default">Download</a>
</div>


@endforeach
