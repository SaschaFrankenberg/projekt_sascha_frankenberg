<x-layout title="Workshops">
    <h1 class="text-3xl font-bold mb-6">Workshops</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($workshops as $workshop)
            <a href="{{ route('workshops.show', $workshop->id) }}"
               class="card bg-base-100 border border-base-300 shadow-sm overflow-hidden transition hover:shadow-md hover:border-primary">
                <div class="aspect-video bg-base-300 flex items-center justify-center text-base-content/50">
                    @if ($workshop->image_path)
                        <img src="{{ asset('storage/'.$workshop->image_path) }}" alt="{{ $workshop->name }}"
                             class="w-full h-full object-cover">
                    @else
                        Kein Bild
                    @endif
                </div>
                <div class="card-body p-4 items-center text-center">
                    <h2 class="card-title text-base">{{ $workshop->name }}</h2>
                </div>
            </a>
        @endforeach
    </div>
</x-layout>
