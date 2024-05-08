<header class="py-10 mx-auto w-full container relative">
    <nav class="flex justify-end w-full fixed top-0 z-10 container my-3">
        <x-link href="{{route('home')}}" class="mr-3" :active="request()->is('/')">Home</x-link>
        <x-link href="{{route('cerca-per-data')}}" class="mr-3" :active="request()->is('cerca-per-data')">Cerca per Data</x-link>
        <x-link href="{{route('cerca-per-nome')}}" class="mr-3" :active="request()->is('cerca-per-nome')">Cerca per Nome</x-link>
        @auth
            <x-link href="{{url('user')}}">Area Riservata</x-link>
        @else
            <x-link href="{{url('user/login')}}" class="mr-3">Effettua Log In</x-link>
            <x-link href="{{url('user/register')}}">Registrazione Utente</x-link>
        @endauth
    </nav>
</header>
