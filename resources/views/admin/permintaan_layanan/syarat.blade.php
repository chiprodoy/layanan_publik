@foreach ($jenisLayanan->syarat_jenis_layanan as $item)
    @if ($item->tipe_persyaratan==App\Models\TipePersyaratan::InputText)
        <x-viho::form.input-text
            :id="$item['field']"
            name="berkas[{{$item['nama_persyaratan']}}]"
            :label="$item['title']"
            :value="$RECORD"
            :readonly="$readOnly"
            :disabled="isset($item['disabled']) ? $item['disabled'] : false"
            :autofocus="isset($item['autofocus']) ? $item['autofocus'] : false"
            :tabindex="isset($item['tabindex']) ? $item['tabindex'] : null"
            :placeholder="isset($item['placeholder']) ? $item['placeholder'] : ''"
            :required="isset($item['required']) ? $item['required'] : false"
        ></x-viho::form.input-text>

    @elseif ($item->tipe_persyaratan==App\Models\TipePersyaratan::InputFile)

        <x-viho::form.input-file
        :id="$item['nama_persyaratan']"
        name="berkas[{{$item['nama_persyaratan']}}]"
        :label="$item['label_persyaratan']"
        {{-- :value="$RECORD"
        :readonly="$readOnly" --}}
        required=true
        ></x-viho::form.input-file>
    @endif


@endforeach
