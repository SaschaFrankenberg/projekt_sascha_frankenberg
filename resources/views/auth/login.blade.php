<x-layout title="Login">
    <div class="panel max-w-lg mx-auto p-8">
        <h1 class="glow-text text-2xl font-bold text-center mb-6">Anmelden</h1>

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-4">
            @csrf

            <div class="flex flex-col gap-1">
                <label for="email" class="text-sm opacity-80">E-Mail:</label>
                <input id="email" type="email" name="email" class="input input-bordered w-full">
            </div>

            <div class="flex flex-col gap-1">
                <label for="password" class="text-sm opacity-80">Passwort:</label>
                <input id="password" type="password" name="password" class="input input-bordered w-full">
            </div>

            <button type="submit" class="btn btn-primary mx-auto mt-2">Anmelden</button>
        </form>
    </div>
</x-layout>
