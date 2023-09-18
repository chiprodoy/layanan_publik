<section id="portfolio" class="portfolio">
    <div class="container">

      <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">Berita</li>
            <li data-filter=".filter-card">Pengumuman</li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container">

          <div class=" portfolio-item filter-app row">
              @foreach ($contentBerita as $item)
              <div class="col-md-6">
                  <div class="card">
                      <div class="card-body">
                          <h4><a href="{{route('public.post.show',$item->slug)}}">{{$item->title}}</a></h4>
                          <div class="post-meta mb-3">
                              <i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a>
                              <i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a>
                          </div>
                          <img src=""/>
                          <p>{{ $item->description }}</p>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
          <div class=" portfolio-item filter-card row">
              @foreach ($contentPengumuman as $item)
              <div class="col-md-6">
                  <div class="card">
                      <div class="card-body">
                          <h4><a href="{{route('public.post.show',$item->slug)}}">{{$item->title}}</a></h4>
                          <div class="post-meta mb-3">
                              <i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a>
                              <i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a>
                          </div>
                          <img src=""/>
                          <p>{{ $item->description }}</p>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>

    </div>
  </section>
