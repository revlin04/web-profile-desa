@extends('layouts.frontend')

@section('title','Home')
@section('content')
@foreach ($home as $home)


<div
  id="home"
  class="header-hero"
  style="background-image: url(images/banner-bg.svg)">
  <div class="container">
    <div class="justify-center row">
      <div class="w-full lg:w-2/3">
        <div class="pt-32 mb-12 text-center lg:pt-48 header-hero-content">
          <h2
            class="
                    mb-3
                    text-4xl
                    font-bold
                    text-white
                    header-title
                    wow
                    fadeInUp
                  "
            data-wow-duration="1.3s"
            data-wow-delay="0.5s">
            {{ $home->title }}
          </h2>
          <p
            class="mb-8 text-white text wow fadeInUp"
            data-wow-duration="1.3s"
            data-wow-delay="0.8s">
            {{ $home->text }}
          </p>
        </div>
        <!-- header hero content -->
      </div>
    </div>
    <!-- row -->
    <div class="justify-center row">
      <div class="w-full lg:w-2/3">
        <div
          class="text-center header-hero-image wow fadeIn"
          data-wow-duration="1.3s"
          data-wow-delay="1.4s">
          <img src="/image/{{ $home->image }}" alt="Hero Image" />

        </div>
        <!-- header hero image -->
      </div>
    </div>
    <!-- row -->
  </div>
  @endforeach
  <!-- container -->
  <div id="particles-1" class="particles"></div>
</div>
<!-- header hero -->
</header>
<style type="text/css">
  .pagination li {
    float: left;
    list-style-type: none;
    margin: 5px;
  }
</style>


<section id="blog" class="blog-area pt-120">
  <div class="container">
    <div class="row">
      <div class="w-full lg:w-1/2">
        <div class="pb-8 section-title">
          <div class="line"></div>
          <h3 class="title"><span>Our Recent</span> News Posts</h3>
        </div>
        <!-- section title -->
      </div>
    </div>
    <!-- row -->
    <label class="relative block">
      <form action="/blog">
        <span class="sr-only">Search</span>
        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
          <svg class="h-5 w-5 fill-gray-300" viewBox="0 0 20 20"><!-- ... --></svg>
        </span>
        <div class="grid grid-cols-6 gap-4">
          <input class="col-span-5 placeholder:italic placeholder:text-gray-400 block bg-white border border-gray-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Search for anything..." type="text" name="search" />
          <button class="p-1 bg-red-300 hover:bg-red-600 hover:drop-shadow-lg text-gray-100 rounded-lg  border-red-300" type="submit">Cari</button>
        </div>
      </form>
    </label>

    <div class="justify-center row">
      @forelse ($blog as $blog)
      <div class="w-full md:w-2/3 lg:w-1/3">
        <div
          class="mx-4 mt-10 single-blog wow fadeIn"
          data-wow-duration="1s"
          data-wow-delay="0.2s">
          <div class="mb-5 max-h-60 overflow-hidden blog-image rounded-xl">
            <img class="w-full" src="/image/{{ $blog->image }}" alt="blog" />
          </div>
          <div class="blog-content">
            <ul class="flex mb-5 meta">
              <li>Author: <a href="javascript:void(0)">{{ $blog->author }}</a></li>
              <li class="ml-12">{{ date('d-m-Y', strtotime($blog->created_at)); }}</li>
            </ul>
            <p class="mb-6 text-2xl leading-snug text-gray-900">
              {{ $blog->title }}
            </p>
            <a class="text-theme-color-2" href="/blog/{{ $blog->title }}">
              Baca Selengkapnya
              <i class="ml-2 lni lni-chevron-right"></i>
            </a>
          </div>
        </div>
        <!-- single blog -->
      </div>
      @empty
      <h2 class="mt-20 text-2xl	font-extrabold	">Oh Tidak Halaman Masih Kosong ...</h2>
      @endforelse


    </div>
    <!-- row -->
  </div>
  <!-- container -->
</section>
<section id="features" class="services-area pt-120">
    <div class="container">
      <div class="justify-center row">
        <div class="w-full lg:w-2/3">
          <div class="pb-10 text-center section-title">
            <div class="m-auto line"></div>
            <h3 class="title">Fasilitas Desa <span>Marengan Daya </span></h3>
          </div> <!-- section title -->
        </div>
      </div> <!-- row -->
      <div class="justify-center row ">
      @foreach ($customer->take(2) as $customer)
        <div class="w-full sm:w-2/3 lg:w-1/3 ">
          <div class="mt-8 text-center single-services wow fadeIn">
            <div class="services-icon">
              <img class="w-full" src="/image/{{ $customer->image }}" alt="shape">
            </div>
            <div class="mt-8 services-content">
              <p class="mb-8">{{ $customer->name }}</p>
            </div>
          </div> <!-- single services -->
        </div>
        @endforeach
      </div> <!-- row -->
    </div> <!-- container -->
  </section>

  <section id="features" class="services-area pt-120">
    <div class="container">
      <div class="justify-center row">
        <div class="w-full lg:w-2/3">
          <div class="pb-10 text-center section-title">
            <div class="m-auto line"></div>
            <h3 class="title">Lembaga Desa <span>Marengan Daya </span></h3>
          </div> <!-- section title -->
        </div>
      </div> <!-- row -->

      <div class="justify-center row ">

        @foreach ($card as $card)

        <div class="w-full sm:w-2/3 lg:w-1/3 ">
          <div class="mt-8 text-center single-services wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
            <div class="services-icon">
              <img class="shape" src="/image/{{ $card->image }}" alt="shape">
            </div>
            <div class="mt-8 services-content">
              <h4 class="mb-8 text-xl font-bold text-gray-900">{{ $card->text }}</h4>
              <p class="mb-8">{{ $card->title }}</p>
            </div>
          </div> <!-- single services -->
        </div>

        @endforeach
      </div> <!-- row -->
    </div> <!-- container -->
  </section>


  <!--====== SERVICES PART ENDS ======-->

  <!--====== ABOUT PART START ======-->

  <section id="about" class="relative pt-20 about-area">
    <div class="container">
      <div class="row">
        <div class="w-full lg:w-1/2">
          @foreach ($about as $about)
          <div
            class="mx-4 mt-12 about-content wow fadeInLeftBig"
            data-wow-duration="1s"
            data-wow-delay="0.5s">
            <div class="mb-4 section-title">
              <div class="line"></div>
              <h3 class="title">
                {{ $about->text }}
              </h3>
            </div>
            <!-- section title -->
            <p class="mb-8">
              {{ $about->title }}
            </p>
          </div>
          <!-- about content -->
        </div>

        <div class="w-full lg:w-1/2">
          <div
            class="mx-4 mt-12 text-center about-image wow fadeInRightBig"
            data-wow-duration="1s"
            data-wow-delay="0.5s">
            <img src="/image/{{ $about->image  }}" alt="about" />
          </div>
          <!-- about image -->
        </div>
      </div>
      <!-- row -->
    </div>
    <!-- container -->

  </section>
  @endforeach

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
                    <li><a href="portfolio">Profil</a></li>
                    <li><a href="contact">Kritik & Saran</a></li>
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
  <!--====== ABOUT PART ENDS ======-->

  @endsection