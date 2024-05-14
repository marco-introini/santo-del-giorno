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
    @vite('resources/css/app.css')
    <title>{{$title}}</title>
    <link rel="icon" type="image/x-icon" href="/images/logo_icon.png">

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto&display=swap"
        rel="stylesheet">


</head>
<body
    class="antialiased bg-violet-50 font-montserrat text-gray-800 dark:bg-black dark:text-white/50 flex flex-col
    h-screen container mx-auto
    px-2">

<x-navbar/>
<main class="mt-6 flex flex-col flex-grow">

    {{$slot}}

</main>

<footer class="py-16 text-center text-sm text-black dark:text-white/70">
    <div>&copy; Marco Introini, 2024 - Open Source Software<br></div>
    <div class="mt-3">
        <x-link href="https://github.com/marco-introini/santo-del-giorno" class="mt-3">Codice Sorgente
        </x-link>
    </div>
</footer>


</body>
</html>
