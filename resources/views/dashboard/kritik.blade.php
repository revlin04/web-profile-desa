<x-app-layout>
    <div class="p-4 sm:p-8 bg-white shadow rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Kritik & Saran</h2>

        @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full table-auto text-sm text-left border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border">Nama</th>
                        <th class="px-4 py-2 border">Email</th>
                        <th class="px-4 py-2 border">Pesan</th>
                        <th class="px-4 py-2 border">Tanggal</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($comments as $comment)
                    <tr>
                        <td class="px-4 py-2 border">{{ $comment->name }}</td>
                        <td class="px-4 py-2 border">{{ $comment->email }}</td>
                        <td class="px-4 py-2 border">{{ $comment->message }}</td>
                        <td class="px-4 py-2 border">{{ $comment->created_at->format('d M Y') }}</td>
                        <td class="px-4 py-2 border">
                            <form action="{{ route('kritik.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Hapus kritik ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:text-red-800">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-4 py-2 border text-center text-gray-500">Belum ada kritik & saran.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $comments->links() }}
        </div>
    </div>
</x-app-layout>
