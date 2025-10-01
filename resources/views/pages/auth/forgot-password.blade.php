<x-layouts.auth :title="'Forgot Password'">

    <x-form-wrapper title="Forgot Password">
        <x-flash-message />
        <form action="{{ route('forgot-password.post') }}" method="POST" class="space-y-6">
            @csrf
            <x-input label="Email address" name="email" type="email" autocomplete="email" />
            <x-submit-button label="Submit" />
        </form>
    </x-form-wrapper>

</x-layouts.auth>