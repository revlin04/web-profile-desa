<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profil') }}
        </h2>
        <h4></h4>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('portfolio.create') }}"><button class="btn btn-primary mb-2">Add New</button></a>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container flex justify-center mx-auto mt-3 ">
                    <div class="flex flex-col">
                        <div class="w-full">
                            <div class="border-b border-gray-200 shadow">
                                <table class="divide-y divide-gray-300 w-full">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-2 text-xs text-gray-500" style="width: 10%;">Image</th>
                                            <th class="px-6 py-2 text-xs text-gray-500" style="width: 15%;">Name</th>
                                            <th class="px-6 py-2 text-xs text-gray-500" style="width: 50%;">Title</th>
                                            <th class="px-6 py-2 text-xs text-gray-500">Date</th>
                                            <th class="px-6 py-2 text-xs text-gray-500">Edit</th>
                                            <th class="px-6 py-2 text-xs text-gray-500">Delete</th>
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white divide-y divide-gray-300">
                                        @foreach ($portfolio as $portfolio)
                                        <tr class="whitespace-nowrap">
                                            <!-- Kolom Image -->
                                            <td class="px-6 py-4" style="width: 10%;">
                                                <img class="w-full h-auto object-cover" src="/image/{{ $portfolio->image }}" alt="{{ $portfolio->name }}">
                                            </td>
                                            <!-- Name Column -->
                                            <td class="px-6 py-4 text-center text-sm text-gray-500" style="width: 15%;">
                                                {{ $portfolio->name }}
                                            </td>
                                            <!-- Title Column -->
                                            <td class="px-6 py-4 break-words whitespace-normal text-justify" style="width: 50%;">
                                                <div class="text-sm text-gray-900">{!! nl2br(e($portfolio->title)) !!}</div>
                                            </td>
                                            <!-- Kolom Date -->
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-gray-900">
                                                    {{ date('d-m-Y', strtotime($portfolio->created_at)) }}
                                                </div>
                                            </td>
                                            <!-- Kolom Edit -->
                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                <a href="portfolio/edit/{{ $portfolio->id }}">
                                                    <button class="btn btn-primary px-4 py-1 text-sm">Edit</button>
                                                </a>
                                            </td>
                                            <!-- Kolom Delete -->
                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                <a href="portfolio/destroy/{{ $portfolio->id }}">
                                                    <button class="btn btn-danger px-4 py-1 text-sm">Delete</button>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
</x-app-layout>