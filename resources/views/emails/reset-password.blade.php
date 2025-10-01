<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-5">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold text-gray-800">Password Reset Request</h1>
        <p class="text-gray-700 mt-4">Hello {{ $name }},</p>

        <p class="text-gray-700 mt-2">
            You are receiving this email because we received a password reset request for your account.
        </p>

        <a href="{{ route('reset-password.get', ['token' => $resetToken, 'email' => $user->email]) }}"
            class="inline-block mt-6 bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition">
            Reset Password
        </a>

        <p class="text-gray-500 text-sm mt-4">
            If the button above does not work, copy and paste the following URL into your web browser:
            <br>
            <span
                class="break-all text-xs">{{ url('/reset-password?token=' . $resetToken . '&email=' . urlencode($user->email)) }}</span>
        </p>

        <p class="text-gray-700 mt-4">This password reset link will expire in 30 minutes.</p>

        <div class="text-center text-gray-500 text-sm mt-8">
            <p>&copy; {{ date('Y') }} Your Application Name. All rights reserved.</p>
        </div>
    </div>
</body>

</html>