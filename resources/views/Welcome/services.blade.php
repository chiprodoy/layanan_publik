<section id="services" class="services">
    <div class="container">
      <h3 style="text-align: center">Layanan</h3>
      <div class="row">
          @foreach ($layanan as $item)
              <div class="col-md-6">
                  <div class="icon-box">
                  <i class="bi bi-card-checklist"></i>
                  <h4><a href="{{ route('permintaan_layanan.create',$item->id)}}">{{ $item->jenis_layanan}}</a></h4>
                  <p>{{ $item->deskripsi_jenis_layanan }}</p>
                  </div>
              </div>
          @endforeach
      </div>
    </div>
  </section>
