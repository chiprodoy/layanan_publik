<section id="about" class="about">
    <div class="container">

      <div class="row content">
        <div class="col-lg-12 pt-4 pt-lg-0">
          <h3><a href='{{ route('public.post.show',$sambutan->slug)}}'>{{$sambutan->title}}</a></h3>
          <p>
            {{ $sambutan->description }}
          </p>
        </div>
      </div>

    </div>
  </section>
