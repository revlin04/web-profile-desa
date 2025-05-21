@extends('layouts.frontend')

@section('title', 'Kritik & Saran')

@section('content')
<section class="pt-[120px] lg:pt-[160px] pb-12">
  <div class="container">
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
  @if($comments->count())
  <div class="max-w-2xl mx-auto mt-12">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Kritik & Saran Sebelumnya</h2>
    @foreach($comments as $comment)
    <div class="mb-6 p-4 bg-gray-50 border border-gray-200 rounded-lg shadow-sm">
      <div class="flex justify-between items-center mb-2">
      <h3 class="text-lg font-semibold text-gray-700">@anonymizeName($comment->name)</h3>
        <span class="text-sm text-gray-500">{{ $comment->created_at->format('d M Y') }}</span>
      </div>
      <p class="text-gray-600 whitespace-pre-line">{{ $comment->message }}</p>
    </div>
    @endforeach
  </div>
  @endif
  </div>
</section>
@endsection