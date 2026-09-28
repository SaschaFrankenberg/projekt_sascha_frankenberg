<x-layout>
    <div class="card bg-base-100 border border-base-300 max-w-lg mx-auto">
        <form method="POST" action="{{ route('login.store') }}" class="card-body gap-4">
            @csrf
            <h2 class="card-title">Anmelden</h2>

            <label class="form-control w-full">
                <span class="label-text mb-1">E-Mail:</span>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="input input-bordered w-full @error('email') input-error @enderror">
            </label>

            <label class="form-control w-full">
                <span class="label-text mb-1">Passwort:</span>
                <input type="password" name="password" required
                       class="input input-bordered w-full @error('password') input-error @enderror">
            </label>

            <div class="card-actions justify-center">
                <button type="submit" class="btn btn-primary">Anmelden</button>
            </div>
        </form>
    </div>
    <p class="text-center text-sm text-base-content/60 mt-3">Nach der Anmeldung folgt die Weiterleitung auf das Dashboard.</p
</x-layout>
