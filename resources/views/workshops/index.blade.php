<x-layout>
    <h1 class="text-2xl font-bold mb-4">Workshops</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($workshops as $workshop)
            {{-- Bild und Titel mit Link zur Show --}}
            <a href="{{ route('workshops.show', $workshop->id) }}"
               class="card bg-base-100 border border-base-300 hover:shadow-lg transition">
                <figure class="h-48 bg-base-300">
                    @if ($workshop->image_path)
                        <img src="{{ asset('storage/'.$workshop->image_path) }}" alt="{{ $workshop->title }}"
                             class="w-full h-full object-cover">
                    @else
                        <span class="text-base-content/50">Kein Bild</span>
                    @endif
                </figure>
                <div class="card-body items-center text-center p-4">
                    <h2 class="card-title">{{ $workshop->title }}</h2>
                </div>
            </a>
        @empty
            <p class="col-span-full text-center text-base-content/60">Noch keine Workshops vorhanden.</p>
        @endforelse
    </div>
</x-layout>
