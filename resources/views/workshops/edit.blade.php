<x-layout title="Workshop bearbeiten">
    <div class="card bg-base-100 border border-base-300 shadow-sm max-w-2xl mx-auto">
        <div class="card-body gap-4">
            <h1 class="card-title mb-2">Workshop bearbeiten</h1>

            {{--            @if ($errors->any())--}}
            {{--                <div class="alert alert-error mb-4">--}}
            {{--                    <ul>--}}
            {{--                        @foreach ($errors->all() as $error)--}}
            {{--                            <li>{{ $error }}</li>--}}
            {{--                        @endforeach--}}
            {{--                    </ul>--}}
            {{--                </div>--}}
            {{--            @endif--}}

            <form id="update-form" method="POST" action="{{ route('workshops.update', $workshop->id) }}"
                  enctype="multipart/form-data" class="flex flex-col gap-4">
                @csrf
                @method('PUT')

                <label class="form-control"></label>
                <span class="label-text font-medium">Kursname:</span>
                <input type="text" name="name" value="{{ old('name', $workshop->name) }}"
                       class="input input-bordered w-full">
                @error('name') <span class="text-error text-sm">{{ $message }}</span> @enderror

                <label class="form-control"></label>
                <span class="label-text font-medium">Beschreibung:</span>
                <textarea name="description" rows="4"
                          class="textarea textarea-bordered w-full">{{ old('description', $workshop->description) }}</textarea>
                @error('description') <span class="text-error text-sm">{{ $message }}</span> @enderror

                <label class="form-control"></label>
                <span class="label-text font-medium">Datum:</span>
                <input type="date" name="date" value="{{ old('date', $workshop->date) }}"
                       class="input input-bordered w-full">
                @error('date') <span class="text-error text-sm">{{ $message }}</span> @enderror

                <label class="form-control"></label>
                <span class="label-text font-medium">Uhrzeit:</span>
                <input type="time" name="time" value="{{ old('time', $workshop->time ?? '') }}"
                       class="input input-bordered w-full">
                @error('time') <span class="text-error text-sm">{{ $message }}</span> @enderror

                <label class="form-control"></label>
                <span class="label-text font-medium">Ort:</span>
                <input type="text" name="location" value="{{ old('location', $workshop->location ?? '') }}"
                       class="input input-bordered w-full">
                @error('location') <span class="text-error text-sm">{{ $message }}</span> @enderror

                <label class="form-control"></label>
                <span class="label-text font-medium">Programmführer:</span>
                <select name="organizer_id" id="organizer_id" class="select select-bordered w-full">
                    <option value="">-- Bitte Organizer wählen --</option>
                    @foreach ($organizers as $user)
                        <option value="{{ $user->id }}"
                            @selected(old('organizer_id', $workshop->organizer_id) == $user->id)>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('organizer_id') <span class="text-error text-sm">{{ $message }}</span> @enderror

                <label class="form-control"></label>
                <span class="label-text font-medium">Bild:</span>
                <input type="file" name="image" class="file-input file-input-bordered w-full">

                <button type="submit" form="update-form" class="btn btn-primary hover:brightness-110">Aktualisieren
                </button>
            </form>
        </div>
    </div>
</x-layout>
