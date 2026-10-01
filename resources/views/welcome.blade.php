<x-layout title="Willkommen">
    {{-- Willkommensgruß --}}
    <section class="card bg-base-100 border border-base-300 shadow-xl">
        <div class="card-body items-center text-center py-16">
            <p class="text-sm tracking-widest uppercase text-primary mb-2">✦ Willkommen ✦</p>
            <h1 class="text-4xl font-bold mb-4">Schön, dass du den Weg zu den Sternen gefunden hast</h1>
            <p class="max-w-2xl text-base-content/80 mb-8">
                Wir sind Sternenwerkstatt, ein Verein für alle, die neugierig auf Astronomie
                und Wissenschaft sind. Ob du zum ersten Mal durch ein Teleskop schaust
                oder schon lange den Himmel beobachtest: Bei uns bist du richtig.
            </p>
            <a href="{{ route('workshops.index') }}" class="btn btn-primary hover:brightness-110">
                Workshops entdecken
            </a>
        </div>
    </section>

    {{-- Was wir machen --}}
    <section class="mt-10">
        <h2 class="text-2xl font-bold text-center mb-6">Was wir machen</h2>
        <div class="grid gap-6 md:grid-cols-3">
            <div class="card bg-base-100 border border-base-300 shadow">
                <div class="card-body">
                    <h3 class="card-title">🔭 Beobachtungsabende</h3>
                    <p>Gemeinsam schauen wir auf Mond, Planeten, Sternhaufen und Nebel.
                        Teleskope sind vorhanden, Vorkenntnisse brauchst du nicht.</p>
                </div>
            </div>
            <div class="card bg-base-100 border border-base-300 shadow">
                <div class="card-body">
                    <h3 class="card-title">🧪 Workshops</h3>
                    <p>Praktisch und verständlich: von Sternbildern über Astrofotografie
                        bis zu Experimenten und Physik zum Anfassen.</p>
                </div>
            </div>
            <div class="card bg-base-100 border border-base-300 shadow">
                <div class="card-body">
                    <h3 class="card-title">🎤 Vorträge & Austausch</h3>
                    <p>Spannende Themen aus Forschung und Raumfahrt, erklärt ohne
                        Fachchinesisch, mit Zeit für deine Fragen.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Mitmachen --}}
    <section class="mt-10 card bg-base-100 border border-base-300 shadow">
        <div class="card-body">
            <h2 class="text-2xl font-bold">So machst du mit</h2>
            <ol class="list-decimal list-inside space-y-1">
                <li>Komm unverbindlich zu einem Treffen oder Beobachtungsabend vorbei.</li>
                <li>Lerne uns kennen und probiere unsere Workshops aus.</li>
                <li>Wenn es dir gefällt, werde Mitglied. Der Beitrag beträgt [Betrag] pro Jahr.</li>
            </ol>
        </div>
    </section>
</x-layout>
