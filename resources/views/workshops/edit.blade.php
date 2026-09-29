<x-layout title="Workshop bearbeiten">
    <div class="card bg-base-100 border border-base-300 shadow-sm max-w-2xl mx-auto">
        <div class="card-body gap-4">
            <h1 class="card-title mb-2">Formular Bearbeiten</h1>

            <form id="update-form" method="POST" action="{{ route('workshops.update', $workshop->id) }}"
                  class="flex flex-col gap-4">
                @csrf
                @method('PUT')

                <label class="form-control"></label>
                <span class="label-text font-medium">Kursname:</span>
                <input type="text" name="name" value="{{ old('name', $workshop->name) }}"
                       class="input input-bordered w-full">
                @error('name') {{ $message }} @enderror

                <label class="form-control"></label>
                <span class="label-text font-medium">Beschreibung:</span>
                <textarea name="description" rows="4"
                          class="textarea textarea-bordered w-full">{{ old('description', $workshop->description) }}</textarea>
                @error('description') {{ $message }} @enderror

                <label class="form-control"></label>
                <span class="label-text font-medium">Datum:</span>
                <input type="date" name="date" value="{{ old('date', $workshop->date) }}"
                       class="input input-bordered w-full">
                @error('date') {{ $message }} @enderror

                <label class="form-control"></label>
                <span class="label-text font-medium">Programmführer:</span>
                <select name="organizer_id" id="organizer_id" class="input input-bordered w-full">
                    <option value="">-- Bitte Organizer wählen --</option>
                    @foreach($organizer as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('organizer_id') {{ $message }} @enderror
            </form>

            {{-- Bild ändern: eigenes Formular wegen Datei-Upload --}}
            <form id="image-form" method="POST" action="{{ route('workshops.images', $workshop->id) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <label class="form-control">
                    <span class="label-text font-medium">Neues Bild:</span>
                    <input type="file" name="image" class="file-input file-input-bordered w-full">
                </label>
            </form>

            <div class="flex justify-between mt-2">
                <button type="submit" form="update-form" class="btn btn-primary hover:brightness-110">Aktualisieren
                </button>
                <button type="submit" form="image-form" class="btn btn-outline hover:bg-base-200">Bild ändern</button>
            </div>
        </div>
    </div>
</x-layout>
