@props(['title', 'links'])

<div>
    <h4 class="text-lg font-semibold mb-4">{{ $title }}</h4>
    <ul class="space-y-2">
        @foreach ($links as $link)
            <li><a href="{{ $link['url'] }}" class="text-slate-400 hover:text-white transition">{{ $link['text'] }}</a></li>
        @endforeach
    </ul>
</div>
