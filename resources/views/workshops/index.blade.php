<x-layout title="Workshops">
    <h1 class="glow-text text-3xl font-bold mb-6">Workshops</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($workshops as $workshop)
            <a href="{{ route('workshops.show', $workshop->id) }}"
               class="panel overflow-hidden transition hover:-translate-y-1 hover:shadow-xl hover:shadow-primary/20">
                <div class="aspect-video bg-base-300 flex items-center justify-center text-3xl opacity-60">
                    @if ($workshop->image_path)
                        <img src="{{ asset('storage/'.$workshop->image_path) }}" alt="{{ $workshop->title }}"
                             class="w-full h-full object-cover">
                    @else
                        ✦
                    @endif
                </div>
                <div class="p-4 text-center">
                    <h2 class="font-semibold text-lg">{{ $workshop->title }}</h2>
                </div>
            </a>
        @endforeach
    </div>
</x-layout>
