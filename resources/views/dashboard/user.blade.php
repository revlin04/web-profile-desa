<x-app-layout>
    <div class="py-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Manage Users</h2>
            <button onclick="openAddModal()" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                <i class="fas fa-plus mr-2"></i> Add New User
            </button>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitescape-nowrap">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex space-x-2">
                                    <button onclick="openEditModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}')"
                                        class="text-indigo-600 hover:text-indigo-900 bg-indigo-100 hover:bg-indigo-200 px-3 py-1 rounded-md transition-colors">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </button>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 bg-red-100 hover:bg-red-200 px-3 py-1 rounded-md transition-colors">
                                            <i class="fas fa-trash-alt mr-1"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add User Modal -->
        <div id="addUserModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg w-1/2 p-6">
                <h2 class="text-xl font-semibold mb-4">Add New User</h2>
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Name</label>
                        <input type="text" name="name" required class="w-full border rounded px-3 py-2">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Email</label>
                        <input type="email" name="email" required class="w-full border rounded px-3 py-2">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Password</label>
                        <input type="password" name="password" required class="w-full border rounded px-3 py-2">
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeAddModal()" class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit User Modal -->
        <div id="editUserModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg w-1/2 p-6">
                <h2 class="text-xl font-semibold mb-4">Edit User</h2>
                <form id="editUserForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700">Name</label>
                        <input type="text" name="name" id="edit-name" required class="w-full border rounded px-3 py-2">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Email</label>
                        <input type="email" name="email" id="edit-email" required class="w-full border rounded px-3 py-2">
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeEditModal()" class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        function openAddModal() {
            document.getElementById('addUserModal').classList.remove('hidden');
        }

        function closeAddModal() {
            document.getElementById('addUserModal').classList.add('hidden');
        }

        function openEditModal(id, name, email) {
            document.getElementById('edit-name').value = name;
            document.getElementById('edit-email').value = email;
            document.getElementById('editUserForm').action = '/dashboard/users/' + id;
            document.getElementById('editUserModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editUserModal').classList.add('hidden');
        }
    </script>
</x-app-layout>