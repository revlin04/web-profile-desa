@extends('layouts.frontend')

@section('title','Portfolio')
@section('content')

<section id="team" class="team-area pt-120">
  <div class="container">
    <div class="justify-center row">
      <div class="w-full lg:w-2/3">
        <div class="pb-8 text-center section-title">

          <div class="m-auto line"></div>
          <h3 class="title"><span>Profil</span></h3>
          <div class="flex justify-center space-x-4 mb-4 text-xl text-gray-600">
            <a href="https://wa.me" target="_blank" title="WhatsApp">
              <i class="fab fa-whatsapp hover:text-green-500"></i>
            </a>
            <a href="https://instagram.com" target="_blank" title="Instagram">
              <i class="fab fa-instagram hover:text-pink-500"></i>
            </a>
            <a href="https://youtube.com" target="_blank" title="YouTube">
              <i class="fab fa-youtube hover:text-red-600"></i>
            </a>
            <a href="/" title="Telepon">
              <i class="fas fa-phone hover:text-blue-500"></i>
            </a>
            <a href="https://t.me" target="_blank" title="Telegram">
              <i class="fab fa-telegram hover:text-sky-500"></i>
            </a>
          </div>
        </div>
      </div> <!-- section title -->
    </div>
  </div> <!-- row -->

  <div class="justify-center row">
    @forelse ($portfolio as $portfolio)
    <div class="w-full sm:w-2/3 lg:w-1/3 ">
      <div class="mt-8 text-center single-team wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <div class="relative team-image">
          <img class="w-full max-h-60 min:h-60" src="/image/{{ $portfolio->image }}" alt="Team">
          <div class="team-social">
            <ul>
              <h2 class="text-white my-2 mx-2"> {{ date('d-m-Y', strtotime($portfolio->created_at))}}</h2>
            </ul>
          </div>
        </div>
        <div class="p-8">
          <h5 class="mb-1 text-xl font-bold text-gray-900">{{ $portfolio->name }}</h5>
          <a class="text-theme-color-2" href="/portfolio/{{ $portfolio->id }}">
            Baca Selengkapnya
            <i class="ml-2 lni lni-chevron-right"></i>
          </a>
        </div>
      </div> <!-- single team -->
    </div>
    @empty
    <h1>Halaman Masih Kosong</h1>
    @endforelse
  </div> <!-- row -->
  </div> <!-- container -->
  <div class="justify-center row">
    <div class="w-full lg:w-2/3">
      <div class="pb-8 text-center section-title">
        <div class="m-auto line"></div>
        <h3 class="title"><span>Galeri</span>Pages</h3>
        <span class="mt-4"><a href="/gallery" class="text-blue-700 font-bold">Foto</a> | <a href="/gallery/videos" class="text-blue-500">Video</a> </span>
      </div>
      <!-- section title -->
    </div>
  </div>
  <!-- row -->
  <div class="justify-center row">
    @forelse ($gallery as $gallery)
    <div class="w-full sm:w-2/3 lg:w-1/3">
      <div
        class="mt-4 text-center single-team wow fadeIn"
        data-wow-duration="1s"
        data-wow-delay="0.5s">
        <div class="relative team-image">
          <img class="w-full max-h-60	" src="/image/{{ $gallery->image }}" alt="Team" />
        </div>
        <div class="p-8">
          <h5 class="mb-1 text-xl font-bold text-gray-900">{{ $gallery->name }}</h5>
          <p>{{ $gallery->title }}</p>
        </div>
      </div>

      <!-- single team -->
    </div>
    @empty
    <h1 class="text-center">Halaman Masih Kosong </h1>
    @endforelse
  </div>
  <div class="mt-10 py-12 bg-white text-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10">
      <div class="lg:text-center">
        <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Wilayah</h2>
        @foreach ($homes as $homes)

        <p class="mt-5 mb-5 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
          {{ $homes->title }}
        </p>
        @endforeach
        @forelse ($misi as $misi)
        <div x-data="{ open: false }" class="text-center">
          <!-- Gambar yang bisa diklik -->
          <img
            src="/image/{{ $misi->image }}"
            alt="Klik untuk lihat lokasi"
            class="inline-block h-60 w-60 rounded-full ring-2 ring-white cursor-pointer transition hover:scale-105"
            @click="open = true">

          <!-- Modal -->
          <div
            x-show="open"
            x-transition
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-4 rounded-lg max-w-3xl w-full relative">
              <!-- Tombol Close -->
              <button @click="open = false" class="absolute top-2 right-2 text-gray-600 hover:text-black text-xl">&times;</button>

              <h2 class="text-lg font-bold mb-4">Lokasi Wilayah</h2>

              <!-- Embed Google Maps -->
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7919.62730864123!2d113.88953069505742!3d-7.031176723702549!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd9e465f0fca5d3%3A0x1ab6b6d31cb9e4d0!2sMarengan%20Daya%2C%20Sumenep%2C%20Sumenep%20Regency%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1747800953061!5m2!1sen!2sid" width="735" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>

        <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
          {{ $misi->text }}
        </p>

      </div>

      <div class="mt-10">
        <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
          <div class="relative">
            <dt>
              <p class="mt-10 ml-16 text-lg leading-6 font-bold text-gray-900">Deskripsi</p>
            </dt>
            <dd class="mt-2 ml-16 text-base text-gray-500">
              {{ $misi->deskripsi }}
            </dd>
          </div>

          <div class="relative">
            <dt>
              <p class="mt-10 ml-16 text-lg leading-6 font-bold text-gray-900">Tentang</p>
            </dt>
            <dd class="mt-2 ml-16 text-base text-gray-500">
              {{ $misi->tentang }}
            </dd>
          </div>

          </dl>
        </div>
      </div>

    </div>
  </div>
  @empty

  <h1 class="mt-10">Halaman Masih Kosong</h1>
  @endforelse
  </div>
</section>
<footer id="footer" class="relative z-10 footer-area pt-120">
  <div
    class="footer-bg"
    style="background-image: url({{ url('images/footer-bg.svg') }})"></div>
  <div class="container">
    <div
      class="
            px-6
            pt-10
            pb-20
            mb-12
            bg-white
            rounded-lg
            shadow-xl
            md:px-12
            subscribe-area
            wow
            fadeIn
          "
      data-wow-duration="1s"
      data-wow-delay="0.5s">
      <div class="row text-right">
        <div class="w-full lg:w-1/2 text-center">
          <div class="lg:mt-12 subscribe-content">
            <h1 class="text-2xl font-bold sm:text-4xl subscribe-title">
              @foreach ($home as $home)
              {{ $home->title }}
              @endforeach

              <span class="block font-normal"></span>
            </h1>
          </div>
        </div>
        <div class="w-full lg:w-1/2">
          <div class="mt-12 subscribe-form">

          </div>
        </div>
      </div>
      <!-- row -->
    </div>
    <!-- subscribe area -->
    <div class="footer-widget pb-120">
      <div class="row">

        <div class="w-4/5 sm:w-2/3 md:w-3/5 lg:w-2/6">
          <div class="row">
            <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/2">
              <div
                class="mt-12 link-wrapper wow fadeIn"
                data-wow-duration="1s"
                data-wow-delay="0.6s">
                <div class="footer-title">
                  <h4 class="mb-8 text-2xl font-bold text-white">
                    Resources
                  </h4>
                </div>
                <ul class="link">
                  <li><a href="/">Home</a></li>
                  <li><a href="/profil">Profil</a></li>
                  <li><a href="/contact">Kritik dan Saran</a></li>
                </ul>
              </div>
              <!-- footer wrapper -->
            </div>
          </div>
        </div>
      </div>
      <!-- row -->
    </div>
    <!-- footer widget -->

    <!-- footer copyright -->
  </div>
  <!-- container -->
  <div id="particles-2" class="particles"></div>
</footer>
<a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>
@endsection