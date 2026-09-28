@props(['title' => 'Verein'])

    <!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-base-200">

<header class="max-w-5xl w-full mx-auto p-4">
    {{-- Logo --}}
    <div class="flex justify-center mb-4">
        <div class="w-32 h-24 bg-base-300 rounded flex items-center justify-center">Logo</div>
    </div>

    <x-navigation />
</header>

<main class="flex-1 max-w-5xl w-full mx-auto p-4">
    {{ $slot }}
</main>

<footer class="footer footer-center p-4 bg-base-300">
    <p>Footer</p>
</footer>

</body>
</html>
