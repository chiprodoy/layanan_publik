@extends('layouts.impact.index')
@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">

      <nav>
        <div class="container">
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>Details</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-8">

            <article class="blog-details">

                <div class="post-img">
                    <img src="{{ $postContent->cover }}" alt="" class="img-fluid">
                </div>

              <h2 class="title">{{$postContent->title}}</h2>

              <div class="meta-top">
                <ul>
                 @isset($postContent->author)
                     <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">{{$postContent->author}}</a></li>
                 @endisset
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="{{$postContent->created_at}}">{{$postContent->created_at}}</time></a></li>
                </ul>
              </div><!-- End meta top -->

              <div class="content">
                {!! $postContent->description !!}
              </div><!-- End post content -->

              <div class="meta-bottom">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                    @foreach ($postContent->categories as $item)
                        <li><a href="#">{{$item->name}}</a></li>
                    @endforeach
                </ul>
                @if (!empty($tags))
                    <i class="bi bi-tags"></i>
                    <ul class="tags">
                        @foreach ($tags as $item)
                            <li><a href="#">{{$item}}</a></li>
                        @endforeach
                    </ul>
                @endif
              </div><!-- End meta bottom -->

            </article><!-- End blog post -->

          </div>

          <div class="col-lg-4">

            <div class="sidebar">
                <div class="sidebar-item recent-posts">
                    <div class="mt-3">

                        @foreach ($similarPost as $item)
                            <div class="post-item mt-3">
                                <img src="{{$item->cover}}" alt="">
                                <div>
                                <h4><a href="blog-details.html">{{$item->title}}</a></h4>
                                <time datetime="2020-01-01">{{ $item->created_at }}</time>
                                </div>
                            </div><!-- End recent post item-->
                        @endforeach

                    </div>

                </div><!-- End sidebar recent posts-->

              <div class="sidebar-item recent-posts">
                <h3 class="sidebar-title">Recent Posts</h3>

                <div class="mt-3">
                    @foreach ($recentPost as $item)
                        <div class="post-item mt-3">
                            <img src="{{$item->cover}}" alt="">
                            <div>
                            <h4><a href="blog-details.html">{{ $item->title}}</a></h4>
                            <time datetime="{{ $item->created_at }}">{{ $item->created_at}}</time>
                            </div>
                        </div><!-- End recent post item-->
                    @endforeach
                </div>

              </div><!-- End sidebar recent posts-->
            </div><!-- End Blog Sidebar -->

          </div>
        </div>

      </div>
    </section><!-- End Blog Details Section -->

  </main><!-- End #main -->

@endsection
