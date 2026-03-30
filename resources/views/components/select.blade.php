@props([
    'label',
    'name',
    'options' => [],
])

<div>
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-100">{{ $label }}</label>
    <div class="mt-2">
        <select
            id="{{ $name }}"
            name="{{ $name }}"
            required
            {{ $attributes->merge([
                'class' => 'block w-full rounded-md border border-white/10 bg-white/5 text-white shadow-sm px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm'
            ]) }}
        >
            <option disabled {{ old($name) ? '' : 'selected' }} value="">Select a role</option>
            @foreach ($options as $value => $label)
                <option class="bg-black" value="{{ $value }}" {{ old($name) == $value ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach
        </select>
    </div>
</div>

