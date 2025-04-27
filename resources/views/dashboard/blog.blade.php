<x-app-layout>
    <div class="py-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Manage Blog Posts</h2>
            <!-- tombol Add New Post -->
            <button id="openModal" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">
                <i class="fas fa-plus mr-2"></i> Add New Post
            </button>

        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                            <i class="fas fa-newspaper text-white text-2xl"></i>
                        </div>
                        <div class="ml-5">
                            <p class="text-sm font-medium text-gray-500 truncate">Total Posts</p>
                            <p class="mt-1 text-3xl font-semibold text-gray-900">{{ count($blog) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                            <i class="fas fa-user-edit text-white text-2xl"></i>
                        </div>
                        <div class="ml-5">
                            <p class="text-sm font-medium text-gray-500 truncate">Authors</p>
                            <p class="mt-1 text-3xl font-semibold text-gray-900">{{ count($blog->pluck('author')->unique()) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                            <i class="fas fa-calendar-alt text-white text-2xl"></i>
                        </div>
                        <div class="ml-5">
                            <p class="text-sm font-medium text-gray-500 truncate">Latest Post</p>
                            <p class="mt-1 text-lg font-semibold text-gray-900">{{ $blog->sortByDesc('created_at')->first() ? date('d M Y', strtotime($blog->sortByDesc('created_at')->first()->created_at)) : 'No posts' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog List -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">All Blog Posts</h3>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Author
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Content
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($blog as $post)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex-shrink-0 h-16 w-24">
                                    <img class="h-16 w-24 object-cover rounded-md" src="/image/{{ $post->image }}" alt="{{ $post->title }}">
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $post->author }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{ date('d M Y', strtotime($post->created_at)) }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $post->title }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500">{{ Str::limit($post->content, 50) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex space-x-2">
                                    <button
                                        class="editBtn text-indigo-600 hover:text-indigo-900 bg-indigo-100 hover:bg-indigo-200 px-3 py-1 rounded-md transition-colors"
                                        data-id="{{ $post->id }}"
                                        data-title="{{ $post->title }}"
                                        data-author="{{ $post->author }}"
                                        data-created_at="{{ $post->created_at }}"
                                        data-content="{{ $post->content }}">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </button>
                                    <a href="blog/destroy/{{$post->id }}" class="text-red-600 hover:text-red-900 bg-red-100 hover:bg-red-200 px-3 py-1 rounded-md transition-colors" onclick="return confirm('Are you sure you want to delete this post?')">
                                        <i class="fas fa-trash-alt mr-1"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex flex-col items-center justify-center py-6">
                                    <i class="fas fa-newspaper text-gray-300 text-5xl mb-3"></i>
                                    <p class="text-gray-500 text-lg">Halaman Masih Kosong</p>
                                    <a href="{{ route('blog.create') }}" class="mt-3 inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md">
                                        <i class="fas fa-plus mr-2"></i> Add Your First Post
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal Add Blog -->
        <div id="modalForm" class="fixed z-10 inset-0 overflow-y-auto hidden">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-2xl w-full p-6 z-50">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold text-gray-800">Create New Blog Post</h2>
                        <button id="closeModal" class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-times text-2xl"></i>
                        </button>
                    </div>

                    <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Form fields -->
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
                            <textarea name="content" id="description" cols="30" rows="4" class="w-full mt-1 p-2 border rounded" required></textarea>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Edit Blog -->
        <div id="modalEdit" class="fixed z-10 inset-0 overflow-y-auto hidden">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-2xl w-full p-6 z-50">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold text-gray-800">Edit Blog Post</h2>
                        <button id="closeModalEdit" class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-times text-2xl"></i>
                        </button>
                    </div>

                    <form method="POST" id="editForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="edit-id">

                        <div class="mb-4">
                            <label class="block text-gray-700">Author</label>
                            <input type="text" name="author" id="edit-author" class="w-full mt-1 p-2 border rounded" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Date</label>
                            <input type="datetime-local" name="created_at" id="edit-created_at" class="w-full mt-1 p-2 border rounded" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Title</label>
                            <input type="text" name="title" id="edit-title" class="w-full mt-1 p-2 border rounded" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Content</label>
                            <textarea name="content" id="edit-content" cols="30" rows="4" class="w-full mt-1 p-2 border rounded" required></textarea>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const openModal = document.getElementById('openModal');
        const closeModal = document.getElementById('closeModal');
        const modalForm = document.getElementById('modalForm');

        openModal.addEventListener('click', () => {
            modalForm.classList.remove('hidden');
        });

        closeModal.addEventListener('click', () => {
            modalForm.classList.add('hidden');
        });

        window.addEventListener('click', (e) => {
            if (e.target == modalForm) {
                modalForm.classList.add('hidden');
            }
        });
        const editButtons = document.querySelectorAll('.editBtn');
        const modalEdit = document.getElementById('modalEdit');
        const closeModalEdit = document.getElementById('closeModalEdit');

        editButtons.forEach(button => {
            button.addEventListener('click', () => {
                const id = button.getAttribute('data-id');
                const title = button.getAttribute('data-title');
                const author = button.getAttribute('data-author');
                const created_at = button.getAttribute('data-created_at');
                const content = button.getAttribute('data-content');

                document.getElementById('edit-id').value = id;
                document.getElementById('edit-title').value = title;
                document.getElementById('edit-author').value = author;
                document.getElementById('edit-created_at').value = new Date(created_at).toISOString().slice(0, 16);
                document.getElementById('edit-content').value = content;

                document.getElementById('editForm').action = `/blog/${id}`; 

                modalEdit.classList.remove('hidden');
            });
        });

        closeModalEdit.addEventListener('click', () => {
            modalEdit.classList.add('hidden');
        });

        window.addEventListener('click', (e) => {
            if (e.target == modalEdit) {
                modalEdit.classList.add('hidden');
            }
        });

        CKEDITOR.replace('edit-content');
    </script>

</x-app-layout>