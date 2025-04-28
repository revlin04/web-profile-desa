<x-app-layout>
    <div class="py-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Manage Gallery</h2>
            <button onclick="openAddModal()" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                <i class="fas fa-plus mr-2"></i> Add New Video
            </button>
        </div>

        <!-- Tab Navigation -->
        <div class="mb-6">
            <nav class="flex space-x-4">
                <a href="/dashboard/gallery" class="{{ request()->is('dashboard/gallery') ? 'bg-indigo-600 text-white' : 'text-gray-600 hover:text-gray-800' }} px-3 py-2 rounded-md text-sm font-medium">
                    Foto
                </a>
                <a href="/dashboard/videos" class="{{ request()->is('dashboard/videos') ? 'bg-indigo-600 text-white' : 'text-gray-600 hover:text-gray-800' }} px-3 py-2 rounded-md text-sm font-medium">
                    Video
                </a>
            </nav>
        </div>

        <!-- Content Section -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">
                    All Videos
                </h3>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Video</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($gallery as $item)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <video class="h-16 w-24 rounded-md" controls>
                                    <source src="/video/{{ $item->video }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $item->name }}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $item->title }}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex space-x-2">
                                    <button onclick="openEditModal('{{ $item->id }}', '{{ $item->name }}', '{{ $item->title }}', '{{ $item->link }}', '{{ $item->video }}')"
                                        class="text-indigo-600 hover:text-indigo-900 bg-indigo-100 hover:bg-indigo-200 px-3 py-1 rounded-md transition-colors">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </button>

                                    <form action="{{ route('videos.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this video?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 bg-red-100 hover:bg-red-200 px-3 py-1 rounded-md transition-colors">
                                            <i class="fas fa-trash-alt mr-1"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex flex-col items-center justify-center py-6">
                                    <i class="fas fa-folder-open text-gray-300 text-5xl mb-3"></i>
                                    <p class="text-gray-500 text-lg">No Videos Yet</p>
                                    <a href="{{ route('videos.create') }}" class="mt-3 inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md">
                                        <i class="fas fa-plus mr-2"></i> Add New
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="p-4">
                    {{ $gallery->links() }}
                </div>
            </div>
            <!-- Add Video Modal -->
            <div id="addVideoModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg w-1/2 p-6">
                    <h2 class="text-xl font-semibold mb-4">Add New Video</h2>
                    <form id="addVideoForm" action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700">Name</label>
                            <input type="text" name="name" required class="w-full border border-gray-300 rounded px-3 py-2">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Title</label>
                            <input type="text" name="title" required class="w-full border border-gray-300 rounded px-3 py-2">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Link</label>
                            <input type="text" name="link" required class="w-full border border-gray-300 rounded px-3 py-2">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Video File</label>
                            <input type="file" name="video" accept="video/*" class="w-full">
                        </div>

                        <div class="flex justify-end space-x-3">
                            <button type="button" onclick="closeAddModal()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Cancel</button>
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Edit Video Modal -->
            <div id="editVideoModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg w-1/2 p-6">
                    <h2 class="text-xl font-semibold mb-4">Edit Video</h2>
                    <form id="editVideoForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" id="edit-id">

                        <div class="mb-4">
                            <label class="block text-gray-700">Name</label>
                            <input type="text" name="name" id="edit-name" required class="w-full border border-gray-300 rounded px-3 py-2">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Title</label>
                            <input type="text" name="title" id="edit-title" required class="w-full border border-gray-300 rounded px-3 py-2">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Link</label>
                            <input type="text" name="link" id="edit-link" required class="w-full border border-gray-300 rounded px-3 py-2">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Change Video (optional)</label>
                            <input type="file" name="video" accept="video/*" class="w-full">
                        </div>

                        <div class="mb-4">
                            <video id="current-video" class="h-32 rounded-md" controls></video>
                        </div>

                        <div class="flex justify-end space-x-3">
                            <button type="button" onclick="closeEditModal()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Cancel</button>
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function openAddModal() {
            document.getElementById('addVideoModal').classList.remove('hidden');
        }

        function closeAddModal() {
            document.getElementById('addVideoModal').classList.add('hidden');
        }

        function openEditModal(id, name, title, link, video) {
            document.getElementById('edit-id').value = id;
            document.getElementById('edit-name').value = name;
            document.getElementById('edit-title').value = title;
            document.getElementById('edit-link').value = link;
            document.getElementById('current-video').src = '/video/' + video;

            document.getElementById('editVideoForm').action = '/dashboard/videos/' + id;

            document.getElementById('editVideoModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editVideoModal').classList.add('hidden');
        }
    </script>

</x-app-layout>