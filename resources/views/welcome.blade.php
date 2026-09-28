<x-layout title="Willkommen">
    <section class="panel p-10 md:p-16 text-center">
        <p class="text-sm tracking-widest uppercase opacity-70 mb-3">✦ Willkommen ✦</p>
        <h1 class="glow-text text-4xl md:text-5xl font-bold mb-6">Vorstellung des Vereins</h1>
        <p class="max-w-2xl mx-auto opacity-80 mb-8">
            Hier steht der Text über den Verein: Wer wir sind, was wir machen
            und wie man bei uns mitmachen kann.
        </p>
        <a href="{{ route('workshops.index') }}" class="btn btn-primary">Workshops entdecken</a>
    </section>
</x-layout>
