<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <x-dashboard.side-bar />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <x-dashboard.header />
            <!-- Create Form Section -->
            <main class="flex-1 overflow-y-auto p-6">
                <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Create New User</h2>
                    <x-flash-message/>
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                            <input type="name" name="name" id="name"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                placeholder="Enter Name" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                            <input type="email" name="email" id="email"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                placeholder="Enter Email" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                            <input type="password" name="password" id="password"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                placeholder="Enter Password" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 font-semibold mb-2">Password
                                Confirmation</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                placeholder="Enter Password Confirmation" required>
                        </div>

                        <div class="mb-4">
                            <label for="Role" class="block text-gray-700 font-semibold mb-2">Role</label>
                            <select name="role" id="role"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <option value="">Select a role</option>

                                @foreach (App\Enums\Roles::cases() as $role)
                                    <option value="{{ $role->value }}" {{ old('role') === $role->value ? 'selected' : '' }}>
                                        {{ $role->label() }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="Role" class="block text-gray-700 font-semibold mb-2">Status</label>

                            <select name="is_active" id="status"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <option value="">Select a status</option>
                                <option value="1" {{ old('is_active') === '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('is_active') === '0' ? 'selected' : '' }}>Inactive</option>
                            </select>

                            <div class="flex justify-end">
                                <button type="submit"
                                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                                    Create
                                </button>
                            </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>

</html>