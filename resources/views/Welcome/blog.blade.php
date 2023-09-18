@extends('layouts.impact.index')
@section('content')

<main id="main" class="sticked-header-offset">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Informasi</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="row gy-4 posts-list">
          @foreach ($contentBerita as $item)

          <div class="col-xl-4 col-md-6">
            <article>
                <div class="post-img">
                    <img src="{{ $item->cover }}" alt="" class="img-fluid">
                </div>

                    @foreach ($item->categories as $cat)
                        <p class="post-category">{{ $cat->name}}</p>
                    @endforeach

                  <h2 class="title">
                    <a href="{{ route('public.post.show',$item->slug) }}">{{ substr($item->title,0,32) }} ...</a>
                  </h2>

                  <div class="d-flex align-items-center">
                    <img src="{{ asset('user.png')}}" alt="" class="img-fluid post-author-img flex-shrink-0">
                    <div class="post-meta">
                      <p class="post-author-list">Admin</p>
                      <p class="post-date">
                        <time datetime="{{ $item->created_at}}">{{ $item->created_at}}</time>
                      </p>
                    </div>
                  </div>
            </article>
          </div><!-- End post list item -->

          @endforeach

        </div><!-- End blog posts list -->
        <div class="blog-pagination">
            {{ $contentBerita->links() }}

        </div><!-- End blog pagination -->

      </div>
    </section><!-- End Blog Section -->

  </main>

@endsection
