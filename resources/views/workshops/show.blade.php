<x-layout :title="$workshop->title">
    <div class="panel max-w-2xl mx-auto p-8">

        <div class="flex justify-end">
            <a href="{{ route('workshops.edit', $workshop->id) }}" class="btn btn-outline btn-sm">Bearbeiten</a>
        </div>

        <h1 class="glow-text text-3xl font-bold mb-6">{{ $workshop->title }}</h1>

        <dl class="grid grid-cols-3 gap-y-4 gap-x-4">
            <dt class="opacity-70">Kursname:</dt>
            <dd class="col-span-2">{{ $workshop->name }}</dd>

            <dt class="opacity-70">Beschreibung:</dt>
            <dd class="col-span-2">{{ $workshop->description }}</dd>

            <dt class="opacity-70">Datum:</dt>
            <dd class="col-span-2">{{ $workshop->date }}</dd>

            <dt class="opacity-70">Programmführer:</dt>
            <dd class="col-span-2">{{ $workshop->organizer->name}}</dd>
        </dl>

{{--        <form method="POST" action="{{ route('workshops.unregister', $workshop->id) }}" class="flex justify-end mt-8">--}}
{{--            @csrf--}}
{{--            @method('DELETE')--}}
{{--            <button type="submit" class="btn btn-warning btn-outline btn-sm">Kurs abmelden</button>--}}
{{--        </form>--}}

    </div>
</x-layout>
