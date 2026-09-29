<x-layout title="Willkommen">
    <section class="card bg-base-100 border border-base-300 shadow-sm">
        <div class="card-body items-center text-center py-16">
            <h1 class="text-4xl font-bold mb-4">Vorstellung des Vereins</h1>
            <p class="max-w-2xl text-base-content/80 mb-8">
                Hier steht der Text über den Verein: Wer wir sind, was wir machen
                und wie man bei uns mitmachen kann.
            </p>
            <a href="{{ route('workshops.index') }}" class="btn btn-primary hover:brightness-110">
                Workshops entdecken
            </a>
        </div>
    </section>
</x-layout>
