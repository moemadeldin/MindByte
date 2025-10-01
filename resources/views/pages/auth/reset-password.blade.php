<!doctype html>
<html class="h-full bg-gray-900">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Auth Page' }}</title>
</head>
<body class="h-full">

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company"
                class="mx-auto h-10 w-auto" />
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-white">
                {{ $title ?? 'Reset Password' }}
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-4 rounded-md bg-green-100 p-4 text-sm text-green-800 ring-1 ring-inset ring-green-300">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Error Message -->
            @if (session('error'))
                <div class="mb-4 rounded-md bg-red-600/20 p-4 text-sm text-red-300 ring-1 ring-inset ring-red-500/30">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('reset-password.post') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Hidden Token -->
                <input type="hidden" name="token" value="{{ $token }}">

                <!-- Hidden Email -->
                <input type="hidden" name="email" value="{{ $email }}">

                <!-- Email Address Field -->
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-100">Email address</label>
                    <div class="mt-2">
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ $email }}"
                            readonly
                            class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"
                        />
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm/6 font-medium text-gray-100">Password</label>
                    <div class="mt-2">
                        <input
                            id="password"
                            name="password"
                            type="password"
                            autocomplete="current-password"
                            class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"
                        />
                    </div>
                </div>

                <!-- Password Confirmation Field -->
                <div>
                    <label for="password_confirmation" class="block text-sm/6 font-medium text-gray-100">Password Confirmation</label>
                    <div class="mt-2">
                        <input
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            autocomplete="current-password"
                            class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"
                        />
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
