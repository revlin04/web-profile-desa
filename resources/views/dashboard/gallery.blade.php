<x-app-layout>
    <div x-data="galleryCrud()" class="py-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Manage Gallery</h2>
            <button @click="openAdd()" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                <i class="fas fa-plus mr-2"></i> Add New Photo
            </button>
        </div>
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

        <!-- Content -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">
                    All Photos
                </h3>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($gallery as $item)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img class="h-16 w-24 object-cover rounded-md" src="/image/{{ $item->image }}" alt="{{ $item->title }}">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $item->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $item->title }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="#" @click.prevent="openEdit({{ $item->id }}, '{{ $item->name }}', '{{ $item->title }}')" class="text-indigo-600 hover:text-indigo-900 bg-indigo-100 hover:bg-indigo-200 px-3 py-1 rounded-md transition">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>
                                    <form action="{{ route('gallery.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this photo?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 bg-red-100 hover:bg-red-200 px-3 py-1 rounded-md transition">
                                            <i class="fas fa-trash-alt mr-1"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                No photos found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4">
                {{ $gallery->links('pagination::tailwind') }}
            </div>
        </div>

        <!-- Modal -->
        <div x-show="modalOpen" @click.self="modalOpen = false" style="display: none" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">
                <button @click="modalOpen = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>

                <h2 class="text-2xl mb-4" x-text="isEdit ? 'Edit Photo' : 'Add New Photo'"></h2>

                <form x-ref="formElement" method="POST" enctype="multipart/form-data" :action="isEdit ? `/dashboard/gallery/${form.id}` : '{{ route('gallery.store') }}'">
                    @csrf
                    <template x-if="isEdit">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    <div class="mb-4">
                        <label class="block text-gray-700">Name</label>
                        <input type="text" name="name" x-model="form.name" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Title</label>
                        <input type="text" name="title" x-model="form.title" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Photo</label>
                        <input type="file" x-ref="file" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" :required="!isEdit">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- AlpineJS Logic -->
    <script>
        function galleryCrud() {
            return {
                modalOpen: false,
                isEdit: false,
                form: {
                    id: null,
                    name: '',
                    title: '',
                },
                openAdd() {
                    this.modalOpen = true;
                    this.isEdit = false;
                    this.form = {
                        id: null,
                        name: '',
                        title: ''
                    };
                    if (this.$refs.file) this.$refs.file.value = '';
                },
                openEdit(id, name, title) {
                    this.modalOpen = true;
                    this.isEdit = true;
                    this.form = {
                        id,
                        name,
                        title
                    };
                },
                submitForm(e) {
                    const formData = new FormData();
                    formData.append('name', this.form.name);
                    formData.append('title', this.form.title);

                    if (this.$refs.file?.files[0]) {
                        formData.append('image', this.$refs.file.files[0]);
                    }

                    if (this.isEdit) {
                        formData.append('_method', 'PUT'); // ini WAJIB saat edit!
                    }

                    const url = this.isEdit ?
                        `/dashboard/gallery/${this.form.id}` :
                        `{{ route('gallery.store') }}`;

                    fetch(url, {
                            method: 'POST', // tetap POST, Laravel baca _method untuk edit
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: formData,
                        })
                        .then(response => {
                            if (!response.ok) throw new Error('Something went wrong!');
                            return response.text(); // Karena redirect bukan JSON
                        })
                        .then(data => {
                            this.modalOpen = false;
                            window.location.reload();
                        })
                        .catch(error => {
                            console.error(error);
                            alert('Ada sesuatu yang salah');
                        });
                }
            }
        }
    </script>
</x-app-layout>