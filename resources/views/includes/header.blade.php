<div class="hidden preloader">
  <div class="loader">
    <div class="ytp-spinner">
      <div class="ytp-spinner-container">
        <div class="ytp-spinner-rotator">
          <div class="ytp-spinner-left">
            <div class="ytp-spinner-circle"></div>
          </div>
          <div class="ytp-spinner-right">
            <div class="ytp-spinner-circle"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--====== PRELOADER PART ENDS ======-->

<!--====== HEADER PART START ======-->
<!--====== PRELOADER PART ENDS ======-->

<!--====== HEADER PART START ======-->
<header class="header-area" x-data="{ isOpen: false }">
  <div class="navbar-area bg-blue-700">
    <div class="container relative">
      <div class="row">
        <div class="w-full">
          <nav class="flex items-center justify-between py-4">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-2">
              <img src="images/logo.jpg" alt="Logo" class="h-10 w-10" />
              <span class="text-white text-lg font-semibold">Marengan Daya</span>
            </a>

            <!-- Hamburger (Mobile) -->
            <button
              @click="isOpen = !isOpen"
              class="block text-white focus:outline-none lg:hidden">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path x-show="!isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16" />
                <path x-show="isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>

            <!-- Navigation -->
            <div
              :class="isOpen ? 'block' : 'hidden'"
              class="absolute top-full left-0 w-full bg-blue-700 text-white px-5 py-3 lg:static lg:flex lg:items-center lg:space-x-6 lg:w-auto lg:bg-transparent"
              id="navbarOne">
              <ul class="flex flex-col space-y-2 lg:flex-row lg:space-y-0 lg:space-x-6">
                <li><a class="page-scroll" href="/portfolio">Profil</a></li>
                <li><a class="page-scroll" href="/contact">Kritik & Saran</a></li>
              </ul>

              <a
                href="/login"
                class="mt-4 lg:mt-0 inline-block px-6 py-2 text-sm font-semibold text-white bg-blue-600 rounded hover:bg-blue-700 transition duration-300">
                Login
              </a>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>
