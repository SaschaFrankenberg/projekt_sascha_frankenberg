<x-layout>
    <form method="POST" action="{{ route('workshops.store') }}">
        @csrf

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="description">Beschreibung</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
            @error('description')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="date">Datum</label>
            <input type="date" name="date" id="date" value="{{ old('date') }}">
            @error('date')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="organizer_id">Organizer</label>
            <select name="organizer_id" id="organizer_id">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('organizer_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('organizer_id')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Erstellen</button>
    </form>
</x-layout>
