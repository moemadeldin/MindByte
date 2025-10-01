@props(['icon', 'colorClass', 'label'])

<button class="px-4 py-2 bg-slate-800 hover:bg-slate-700 {{ $colorClass }} rounded-full flex items-center space-x-2">
    <i class="fas fa-{{ $icon }}"></i>
    <span>{{ $label }}</span>
</button>