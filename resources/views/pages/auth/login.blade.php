<x-layouts.auth :title="'Login'">

    <x-form-wrapper title="Login">
        <x-flash-message />

        <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
            @csrf
            <x-input label="Email address" name="email" type="email" autocomplete="email" />
            <x-input label="Password" name="password" type="password" autocomplete="current-password" />
            <x-submit-button label="Login" />
        </form>
        <x-link href="{{ route('register') }}" linkText="Register here">
            Don't have an account?
        </x-link>
        <x-link href="{{ route('forgot-password.get') }}" linkText="Reset">
            Reset Password?
        </x-link>
    </x-form-wrapper>

</x-layouts.auth>