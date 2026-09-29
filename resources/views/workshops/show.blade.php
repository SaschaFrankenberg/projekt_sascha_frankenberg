<x-layout :title="$workshop->title">
    <div class="card bg-base-100 border border-base-300 shadow-sm max-w-2xl mx-auto">
        <div class="card-body">

            <div class="flex justify-end">
                <a href="{{ route('workshops.edit', $workshop->id) }}"
                   class="btn btn-outline btn-sm hover:bg-base-200">
                    Bearbeiten
                </a>
            </div>

            <h1 class="text-3xl font-bold mb-6">{{ $workshop->name }}</h1>

            <dl class="grid grid-cols-3 gap-y-4 gap-x-4">
                <dt class="font-medium text-base-content/70">Kursname:</dt>
                <dd class="col-span-2">{{ $workshop->name }}</dd>

                <dt class="font-medium text-base-content/70">Beschreibung:</dt>
                <dd class="col-span-2">{{ $workshop->description }}</dd>

                <dt class="font-medium text-base-content/70">Datum:</dt>
                <dd class="col-span-2">{{ $workshop->date }}</dd>

                <dt class="font-medium text-base-content/70">Programmführer:</dt>
                <dd class="col-span-2">{{ $workshop->organizer->name}}</dd>
            </dl>

{{--            <form method="POST" action="{{ route('workshops.unregister', $workshop->id) }}" class="flex justify-end mt-8">--}}
{{--                @csrf--}}
{{--                @method('DELETE')--}}
{{--                <button type="submit" class="btn btn-outline btn-warning btn-sm hover:bg-warning hover:text-warning-content">--}}
{{--                    Kurs abmelden--}}
{{--                </button>--}}
{{--            </form>--}}

        </div>
    </div>
</x-layout>
