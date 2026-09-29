<x-layout title="Neuen Workshop erstellen">
    <div class="card bg-base-100 border border-base-300 shadow-sm max-w-2xl mx-auto">
        <form method="POST" action="{{ route('workshops.store') }}" enctype="multipart/form-data"
              class="card-body gap-4">
            @csrf
            <h1 class="card-title mb-2">Neuen Workshop erstellen</h1>

            <label class="form-control"></label>
            <span class="label-text font-medium">Kursname:</span>
            <input type="text" name="name" value="{{ old('name') }}" class="input input-bordered w-full">
            @error('name') {{ $message }} @enderror

            <label class="form-control"></label>
            <span class="label-text font-medium">Beschreibung:</span>
            <textarea name="description" rows="4"
                      class="textarea textarea-bordered w-full">{{ old('description') }}</textarea>
            @error('description') {{ $message }} @enderror

            <label class="form-control"></label>
            <span class="label-text font-medium">Datum:</span>
            <input type="date" name="date" value="{{ old('date') }}" class="input input-bordered w-full">
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

            <label class="form-control"></label>
            <span class="label-text font-medium">Bild:</span>
            <input type="file" name="image" value="{{ old('image') }}" class="file-input file-input-bordered w-full">
            @error('image') {{ $message }} @enderror

            <div class="flex justify-between mt-4">
                <button type="submit" class="btn btn-primary hover:brightness-110">Erstellen</button>
                <a href="{{ route('dashboard') }}" class="btn btn-ghost hover:bg-base-200">Abbrechen</a>
            </div>
        </form>
    </div>
</x-layout>
