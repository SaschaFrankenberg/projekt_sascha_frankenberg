<x-layout title="Login">
    <div class="card bg-base-100 border border-base-300 shadow-sm max-w-lg mx-auto">
        <form method="POST" action="{{ route('login') }}" class="card-body gap-4">
            @csrf
            <h1 class="card-title justify-center mb-2">Anmelden</h1>

            <label class="form-control">
                <span class="label-text font-medium">E-Mail:</span>
                <input type="email" name="email" class="input input-bordered w-full">
            </label>

            <label class="form-control">
                <span class="label-text font-medium">Passwort:</span>
                <input type="password" name="password" class="input input-bordered w-full">
            </label>

            <button type="submit" class="btn btn-primary hover:brightness-110 mt-2">Anmelden</button>
        </form>
    </div>
</x-layout>
