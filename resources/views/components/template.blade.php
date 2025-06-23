@props([
    'title' => 'Santo del Giorno'
])

    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="icon" type="image/x-icon" href="/images/logo_icon.png">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet"/>
    @vite('resources/css/app.css')

    <x-analytics/>

</head>
<body
    class="antialiased bg-violet-50 font-montserrat text-gray-800 flex flex-col
    h-screen container mx-auto px-2">

<x-navbar/>

<main class="flex flex-col grow container">

    {{$slot}}

</main>

<footer class="py-16 text-center text-sm text-black ">
    <div>&copy;
        <x-link href="https://marcointroini.it">Marco Introini</x-link>, 2025 - Open Source Software<br></div>
    <div class="mt-3">
        <x-link href="https://github.com/marco-introini/santo-del-giorno">Codice Sorgente</x-link>
    </div>
</footer>

@fluxScripts
</body>
</html>
