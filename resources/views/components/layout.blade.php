@props(['title' => 'Verein'])

    <!DOCTYPE html>
<html lang="de" data-theme="night">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Sternenhimmel */
        body {
            background:
                radial-gradient(1.5px 1.5px at 20px 30px, #fff, transparent),
                radial-gradient(1px 1px at 90px 120px, #cbd5ff, transparent),
                radial-gradient(1.5px 1.5px at 160px 60px, #fff, transparent),
                radial-gradient(1px 1px at 130px 180px, #ffe9c4, transparent),
                linear-gradient(180deg, #0b1026 0%, #151a3d 55%, #2a1650 100%);
            background-size: 200px 200px, 200px 200px, 200px 200px, 200px 200px, 100% 100%;
            background-attachment: fixed;
        }

        /* Glas-Panel für Karten und Formulare */
        .panel {
            background: rgba(15, 20, 50, 0.6);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1rem;
        }

        /* Leuchtende Überschriften */
        .glow-text {
            background: linear-gradient(90deg, #a5b4fc, #f0abfc);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col text-base-content">

{{-- Logo-Banner über die volle Browserbreite --}}
<a href="{{ route('home') }}" class="block w-full h-40 md:h-64 bg-base-300 border-b border-white/10 overflow-hidden">
    <img src="{{ asset('images/generated-image.png') }}" alt="Vereinslogo" class="w-full h-full object-cover">
</a>

<header class="max-w-5xl w-full mx-auto px-4 mt-4">
    <x-navigation />
</header>

<main class="flex-1 max-w-5xl w-full mx-auto px-4 py-8">
    {{ $slot }}
</main>

<footer class="text-center text-sm opacity-70 py-6 border-t border-white/10">
    ✦ Footer ✦
</footer>

</body>
</html>
