<x-layout title="Dashboard">
    <div class="flex items-center justify-between mb-6">
        <h1 class="glow-text text-3xl font-bold">Dashboard</h1>
        <a href="{{ route('workshops.create') }}" class="btn btn-primary">+ Neuen Kurs anlegen</a>
    </div>

    <div class="flex flex-col gap-4">
        @foreach ($workshops as $workshop)
            {{-- Kursbild als Hintergrund --}}
            <div class="panel relative overflow-hidden bg-cover bg-center"
                 @if ($workshop->image_path) style="background-image: url('{{ asset('storage/'.$workshop->image_path) }}')" @endif>
                <div class="absolute inset-0 bg-gradient-to-r from-base-300/95 via-base-300/70 to-base-300/40"></div>

                <div class="relative flex items-center justify-between gap-4 p-5">
                    <div>
                        <a href="{{ route('workshops.show', $workshop->id) }}" class="btn btn-primary btn-sm">
                            {{ $workshop->title }}
                        </a>
                        <p class="mt-3 text-sm opacity-90">Programmführer: {{ $workshop->leader }}</p>
                    </div>

                    <form method="POST" action="{{ route('workshops.destroy', $workshop->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-error btn-outline btn-sm">Löschen</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
