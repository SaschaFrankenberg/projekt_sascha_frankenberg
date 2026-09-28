<x-layout title="Neuen Workshop erstellen">
    <div class="panel max-w-2xl mx-auto p-8">
        <h1 class="glow-text text-2xl font-bold mb-6">Neuen Workshop erstellen</h1>

        <form method="POST" action="{{ route('workshops.store') }}" enctype="multipart/form-data" class="flex flex-col gap-4">
            @csrf

            <div class="flex flex-col gap-1">
                <label for="title" class="text-sm opacity-80">Kursname:</label>
                <input id="title" type="text" name="title" class="input input-bordered w-full">
            </div>

            <div class="flex flex-col gap-1">
                <label for="description" class="text-sm opacity-80">Beschreibung:</label>
                <textarea id="description" name="description" rows="4" class="textarea textarea-bordered w-full"></textarea>
            </div>

            <div class="flex flex-col gap-1">
                <label for="date" class="text-sm opacity-80">Datum:</label>
                <input id="date" type="date" name="date" class="input input-bordered w-full">
            </div>

            <div class="flex flex-col gap-1">
                <label for="leader" class="text-sm opacity-80">Programmführer:</label>
                <input id="leader" type="text" name="leader" class="input input-bordered w-full">
            </div>

            <div class="flex flex-col gap-1">
                <label for="image" class="text-sm opacity-80">Bild:</label>
                <input id="image" type="file" name="image" class="file-input file-input-bordered w-full">
            </div>

            <div class="flex justify-between mt-4">
                <button type="submit" class="btn btn-primary">Erstellen</button>
                <a href="{{ route('dashboard') }}" class="btn btn-ghost">Abbrechen</a>
            </div>
        </form>
    </div>
</x-layout>
