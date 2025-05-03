@extends('layouts.frontend')

@section('title', 'Kritik & Saran')

@section('content')
<section class="pt-24 pb-12">
  <div class="container">
    <nav class="flex mb-10" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
          <a href="/" class="inline-flex items-center text-sm text-gray-700 hover:text-gray-900">
            <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
            </svg>
            Home
          </a>
        </li>
        <li>
          <div class="flex items-center">
            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
            <span class="ml-1 text-sm font-medium text-gray-500">Kritik & Saran</span>
          </div>
        </li>
      </ol>
    </nav>

    <div class="text-center mb-10">
      <h1 class="text-4xl font-bold text-gray-800">Kritik & Saran</h1>
      <p class="mt-2 text-gray-600">Kami menghargai semua masukan Anda.</p>
    </div>

    @if (session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('success') }}
      </div>
    @endif

    <form action="/contact/send" method="POST" class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
      @csrf
      <div class="mb-6">
        <label class="block mb-2 text-sm font-bold text-gray-700">Nama</label>
        <input type="text" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
      </div>
      <div class="mb-6">
        <label class="block mb-2 text-sm font-bold text-gray-700">Email</label>
        <input type="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
      </div>
      <div class="mb-6">
        <label class="block mb-2 text-sm font-bold text-gray-700">Kritik / Saran</label>
        <textarea name="message" rows="6" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required></textarea>
      </div>
      <div class="flex justify-center space-x-4">
  <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded">
    Kirim
  </button>
  <button type="reset" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-6 rounded">
    Reset
  </button>
</div>
      </div>
    </form>
  </div>
</section>
@endsection
