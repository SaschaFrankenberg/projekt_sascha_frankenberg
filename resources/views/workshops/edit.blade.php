<x-layout title="Workshop bearbeiten">
    <div class="panel max-w-2xl mx-auto p-8">
        <h1 class="glow-text text-2xl font-bold mb-6">Formular Bearbeiten</h1>

        <form id="update-form" method="POST" action="{{ route('workshops.update', $workshop->id) }}" class="flex flex-col gap-4">
            @csrf
            @method('PUT')

            <div class="flex flex-col gap-1">
                <label for="title" class="text-sm opacity-80">Kursname:</label>
                <input id="title" type="text" name="title" value="{{ $workshop->title }}" class="input input-bordered w-full">
            </div>

            <div class="flex flex-col gap-1">
                <label for="description" class="text-sm opacity-80">Beschreibung:</label>
                <textarea id="description" name="description" rows="4" class="textarea textarea-bordered w-full">{{ $workshop->description }}</textarea>
            </div>

            <div class="flex flex-col gap-1">
                <label for="date" class="text-sm opacity-80">Datum:</label>
                <input id="date" type="date" name="date" value="{{ $workshop->date }}" class="input input-bordered w-full">
            </div>

            <div class="flex flex-col gap-1">
                <label for="leader" class="text-sm opacity-80">Programmführer:</label>
                <input id="leader" type="text" name="leader" value="{{ $workshop->leader }}" class="input input-bordered w-full">
            </div>
        </form>

        {{-- Bild ändern: eigenes Formular wegen Datei-Upload --}}
        <form id="image-form" method="POST" action="{{ route('workshops.image', $workshop->id) }}" enctype="multipart/form-data" class="mt-4">
            @csrf
            @method('PATCH')
            <input type="file" name="image" class="file-input file-input-bordered w-full">
        </form>

        <div class="flex justify-between mt-6">
            <button type="submit" form="update-form" class="btn btn-primary">Aktualisieren</button>
            <button type="submit" form="image-form" class="btn btn-outline">Bild ändern</button>
        </div>
    </div>
</x-layout>
