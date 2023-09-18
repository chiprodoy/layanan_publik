<nav id="navbar" class="navbar">
    <ul>
      <li><a href="index.html" class="active">Home</a></li>

      <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
          <li><a href="{{route('public.post.show','sejarah')}}">Sejarah</a></li>
          <li><a href="{{ route('public.post.show','visi-dan-misi')}}">Visi Misi</a></li>
          <li><a href="{{ route('public.post.show','struktur-organisasi')}}">Struktur Organisasi</a></li>
          <li><a href="{{ route('public.post.show','profil-pendidik')}}">Profil Pendidik</a></li>
          <li><a href="{{ route('public.post.show','profil-siswa-dan-alumni')}}">Profil Siswa & Alumni</a></li>

          <li class="dropdown"><a href="#"><span>Unit</span> <i class="bi bi-chevron-right"></i></a>
            <ul>
              <li><a href="{{route('public.post.show','perpustakaan')}}">Perpustakaan</a></li>
              <li><a href="{{route('public.post.show','bimbbingan-konseling')}}">Bimbingan Konseling</a></li>
              <li><a href="{{route('public.post.show','osis-dan-mpk')}}">OSIS & MPK</a></li>
              <li><a href="#">Deep Drop Down 4</a></li>
              <li><a href="#">Deep Drop Down 5</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li><a href="{{route('public.post.category','prestasi')}}">Prestasi</a></li>
      <li><a href="portfolio.html">Elearning</a></li>
      <li><a href="pricing.html">Galeri</a></li>
      <li><a href="{{route('public.post.show','berita')}}">Berita & Pengumuman</a></li>

      <li><a href="{{route('public.post.show','kontak')}}">Kontak</a></li>
      <li><a href="{{route('public.post.category','kerja-sama')}}" class="getstarted">Kerja Sama</a></li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav>
