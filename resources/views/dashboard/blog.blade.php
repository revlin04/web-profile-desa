<x-app-layout>
    <div class="py-6" x-data="{ addModal: false, editModal: false, editData: {} }">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Manage Blog Posts</h2>
            <button @click="addModal = true" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition">
                <i class="fas fa-plus mr-2"></i> Add New Post
            </button>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <!-- Total Posts -->
            <div class="bg-white shadow rounded-lg p-6 flex items-center">
                <div class="bg-indigo-500 text-white p-3 rounded-md">
                    <i class="fas fa-newspaper text-2xl"></i>
                </div>
                <div class="ml-5">
                    <p class="text-sm text-gray-500">Total Posts</p>
                    <p class="text-2xl font-bold">{{ count($blog) }}</p>
                </div>
            </div>

            <!-- Authors -->
            <div class="bg-white shadow rounded-lg p-6 flex items-center">
                <div class="bg-green-500 text-white p-3 rounded-md">
                    <i class="fas fa-user-edit text-2xl"></i>
                </div>
                <div class="ml-5">
                    <p class="text-sm text-gray-500">Authors</p>
                    <p class="text-2xl font-bold">{{ count($blog->pluck('author')->unique()) }}</p>
                </div>
            </div>

            <!-- Latest Post -->
            <div class="bg-white shadow rounded-lg p-6 flex items-center">
                <div class="bg-yellow-500 text-white p-3 rounded-md">
                    <i class="fas fa-calendar-alt text-2xl"></i>
                </div>
                <div class="ml-5">
                    <p class="text-sm text-gray-500">Latest Post</p>
                    <p class="text-lg font-semibold">{{ $blog->sortByDesc('created_at')->first() ? date('d M Y', strtotime($blog->sortByDesc('created_at')->first()->created_at)) : 'No posts' }}</p>
                </div>
            </div>
        </div>
        <!-- Search Bar -->
        <div class="mb-4 flex justify-end">
            <form action="{{ route('blog.index') }}" method="GET" class="flex items-center space-x-2">
                <input type="text" name="search" placeholder="Search title..." value="{{ request('search') }}"
                    class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                    <i class="fas fa-search mr-1"></i> Search
                </button>
            </form>
        </div>

        <!-- Blog List Table -->
        <div class="bg-white shadow rounded-lg">
            <div class="bg-gray-100 p-4 border-b">
                <h3 class="text-lg font-semibold text-gray-800">All Blog Posts</h3>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600">Image</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600">Author</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600">Content</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($blog as $post)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4">
                                <img class="h-16 w-24 object-cover rounded" src="/image/{{ $post->image }}" alt="{{ $post->title }}">
                            </td>
                            <td class="px-6 py-4">{{ $post->author }}</td>
                            <td class="px-6 py-4">{{ date('d M Y', strtotime($post->created_at)) }}</td>
                            <td class="px-6 py-4">{{ $post->title }}</td>
                            <td class="px-6 py-4">{{ Str::limit($post->content, 50) }}</td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <button @click="editModal = true; editData = {{ json_encode($post) }}" class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded hover:bg-indigo-200">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <form action="{{ route('blog.destroy', $post->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-100 text-red-600 px-3 py-1 rounded hover:bg-red-200">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-6">
                                <p class="text-gray-500">No posts available.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="p-4">
                {{ $blog->appends(request()->query())->links() }}
                </div>
            </div>
        </div>

        <!-- Modal Add -->
        <div x-show="addModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" x-cloak>
            <div class="bg-white rounded-lg p-6 w-full max-w-2xl" @click.away="addModal = false">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold">Create New Post</h2>
                    <button @click="addModal = false" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Image</label>
                        <input type="file" name="image" class="w-full mt-1 p-2 border rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Author</label>
                        <input type="text" name="author" class="w-full mt-1 p-2 border rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Date</label>
                        <input type="datetime-local" name="created_at" class="w-full mt-1 p-2 border rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Title</label>
                        <input type="text" name="title" class="w-full mt-1 p-2 border rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Content</label>
                        <textarea name="content" class="w-full mt-1 p-2 border rounded" required></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="reset" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">
                            Reset
                        </button>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Edit -->
        <div x-show="editModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" x-cloak>
            <div class="bg-white rounded-lg p-6 w-full max-w-2xl" @click.away="editModal = false">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold">Edit Post</h2>
                    <button @click="editModal = false" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form :action="'{{ route('blog.update', '') }}/' + editData.id" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700">Author</label>
                        <input type="text" name="author" class="w-full mt-1 p-2 border rounded" x-model="editData.author" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Date</label>
                        <input type="datetime-local" name="created_at" class="w-full mt-1 p-2 border rounded" :value="(new Date(editData.created_at)).toISOString().slice(0,16)" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Title</label>
                        <input type="text" name="title" class="w-full mt-1 p-2 border rounded" x-model="editData.title" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Content</label>
                        <textarea name="content" class="w-full mt-1 p-2 border rounded" x-text="editData.content" required></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>