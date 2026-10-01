<x-layout title="Dashboard">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold">Dashboard</h1>
        @can('is-organizer')
            <a href="{{ route('workshops.create') }}" class="btn btn-primary hover:brightness-110">
                + Neuen Kurs anlegen
            </a>
        @endcan
    </div>

    <div class="flex flex-col gap-4">
        @foreach ($workshops as $workshop)
            <div class="card border border-base-300 shadow-sm overflow-hidden">

                {{-- Kursbild als Hintergrund, klickbar zur Show-Seite --}}
                <a href="{{ route('workshops.show', $workshop->id) }}"
                   class="block bg-base-300 bg-cover bg-center"
                   @if ($workshop->image_path)
                       style="background-image: url('{{ asset('storage/'.$workshop->image_path) }}'); min-height: 200px;"
                    @endif>
                    <div class="bg-base-100/90 p-5">
                        <h3 class="text-lg font-bold">{{ $workshop->name }}</h3>
                        <p class="mt-3 text-sm font-medium">Programmführer: {{ $workshop->organizer->name }}</p>
                        <p class="mt-3 text-sm font-medium">{{ $workshop->members_count }} Teilnehmer</p>
                    </div>
                </a>

                @can('is-organizer')
                    <div class="flex justify-end gap-2 p-3 border-t border-base-300">
                        <a href="{{ route('workshops.edit', $workshop->id) }}"
                           class="btn btn-outline btn-sm hover:bg-base-200">
                            Bearbeiten
                        </a>

                        <form method="POST" action="{{ route('workshops.destroy', $workshop->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-outline btn-error btn-sm hover:bg-error hover:text-error-content">
                                Löschen
                            </button>
                        </form>
                    </div>
                @endcan

            </div>
        @endforeach
    </div>
</x-layout>
