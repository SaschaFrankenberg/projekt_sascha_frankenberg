@props(['title' => 'Verein'])

    <!DOCTYPE html>
<html lang="de" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-base-200 text-base-content">

@if (session('success'))
    <div class="alert alert-success mb-4"><span>{{ session('success') }}</span></div>
@endif

<a href="{{ route('welcome') }}" class="block w-full h-40 md:h-56 bg-neutral overflow-hidden">
    <img src="{{ asset('images/generated-image.png') }}" alt="Vereinslogo" class="w-full h-full object-cover">
</a>

<header class="max-w-5xl w-full mx-auto px-4 mt-4">
    <x-navigation/>
</header>

<main class="flex-1 max-w-5xl w-full mx-auto px-4 py-8">
    {{ $slot }}
</main>

<footer class="text-center text-sm text-base-content/70 py-6 border-t border-base-300">
    Footer
</footer>
</body>
</html>
