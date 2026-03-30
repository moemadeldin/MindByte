
<div class="mb-20">
    <h2 class="text-2xl font-bold mb-6 text-center">Popular Categories</h2>
    <div class="flex flex-wrap justify-center gap-3">
        @foreach ($categories as $category)
            <button class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-blue-400 rounded-full flex items-center">
                <i class="fas fa-laptop-code mr-2"></i> {{ $category->name }}
            </button>
        @endforeach
        </div>

        {{-- <button class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-purple-400 rounded-full flex items-center">
            <i class="fas fa-paint-brush mr-2"></i> Design
        </button>
        <button class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-green-400 rounded-full flex items-center">
            <i class="fas fa-chart-line mr-2"></i> Business
        </button>
        <button class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-yellow-400 rounded-full flex items-center">
            <i class="fas fa-camera mr-2"></i> Photography
        </button>
        <button class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-red-400 rounded-full flex items-center">
            <i class="fas fa-language mr-2"></i> Languages
        </button>
        <button class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-pink-400 rounded-full flex items-center">
            <i class="fas fa-music mr-2"></i> Music
        </button> --}}
    </div>
</div>