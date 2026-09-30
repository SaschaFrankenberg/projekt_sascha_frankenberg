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
            {{-- Kursbild als Hintergrund --}}
            <div class="card border border-base-300 shadow-sm overflow-hidden bg-base-300 bg-cover bg-center"
                 @if ($workshop->image_path) style="background-image: url('{{ asset('storage/'.$workshop->image_path) }}')" @endif>
                <div class="bg-base-100/90 flex items-center justify-between gap-4 p-5">
                    <div>
                        <a href="{{ route('workshops.show', $workshop->id) }}"
                           class="btn btn-outline btn-primary btn-sm hover:bg-primary hover:text-primary-content">
                            {{ $workshop->name }}
                        </a>
                        <p class="mt-3 text-sm font-medium">
                            Programmführer: {{ $workshop->leader }} · {{ $workshop->members_count }} Teilnehmer
                        </p>
                    </div>

                    <form method="POST" action="{{ route('workshops.destroy', $workshop->id) }}">
                        @csrf
                        @method('DELETE')
                        @can('is-organizer')
                            <button type="submit"
                                    class="btn btn-outline btn-error btn-sm hover:bg-error hover:text-error-content">
                                Löschen
                            </button>
                        @endcan
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
