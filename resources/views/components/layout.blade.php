@props(['title' => 'Verein'])

    <!DOCTYPE html>
<html lang="de" data-theme="observatory">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-base-200 text-base-content">

<a href="{{ route('welcome') }}" class="block w-full h-48 md:h-72 overflow-hidden relative">
    <img src="{{ asset('images/generated-image.png') }}" alt="Vereinslogo" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-t from-base-200 via-transparent to-transparent"></div>
</a>

<header class="max-w-5xl w-full mx-auto px-4 -mt-8 relative z-10">
    <x-navigation/>
</header>

<main class="flex-1 max-w-5xl w-full mx-auto px-4 py-8">
    @if (session('status'))
        <div class="alert alert-success mb-4"><span>{{ session('status') }}</span></div>
    @endif

    @if ($errors->any())
        <div class="alert alert-error mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ $slot }}
</main>

<footer class="text-center text-sm text-base-content/60 py-6 border-t border-base-300">
    <aside>
        <p class="font-semibold text-base-content">✦ Sternenwerkstatt ✦</p>
        <p class="text-sm">Gemeinsam den Himmel entdecken.</p>
        <p class="text-xs">© {{ date('Y') }} Sternenwerkstatt. Alle Rechte vorbehalten.</p>
    </aside>
</footer>

</body>
</html>
