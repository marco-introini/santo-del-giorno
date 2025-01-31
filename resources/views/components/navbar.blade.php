<header class="py-10 mx-auto w-full container relative">
    <nav class="flex w-full fixed top-0 z-10 container my-3">
        <flux:header class="container bg-violet-100 border-b border-violet-200">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left"/>

            <flux:navbar class="-mb-px max-lg:hidden w-full">
                <flux:navbar.item icon="home" href="{{route('home')}}" :current="request()->is('/')">Home</flux:navbar.item>
                <flux:navbar.item icon="calendar-days" href="{{route('cerca-per-data')}}" :current="request()->is('cerca-per-data')">Cerca per Data</flux:navbar.item>
                <flux:navbar.item icon="users" href="{{route('cerca-per-nome')}}" :current="request()->is('cerca-per-nome')">Cerca per Nome</flux:navbar.item>

                <flux:spacer />

                <flux:navbar.item href="{{url('user')}}">Area Riservata</flux:navbar.item>
                <flux:navbar.item href="{{url('user/register')}}">Registrazione</flux:navbar.item>
            </flux:navbar>
        </flux:header>

        <flux:sidebar stashable sticky class="lg:hidden bg-violet-50 border-r border-violet-200">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />x" />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="home" href="{{route('home')}}" :current="request()->is('/')">Home</flux:navlist.item>
                <flux:navlist.item icon="calendar-days" href="{{route('cerca-per-data')}}" :current="request()->is('cerca-per-data')">Cerca per Data</flux:navlist.item>
                <flux:navlist.item icon="users" href="{{route('cerca-per-nome')}}" :current="request()->is('cerca-per-nome')">Cerca per Nome</flux:navlist.item>
                <flux:navlist.item href="{{url('user')}}">Area Riservata</flux:navlist.item>
                <flux:navlist.item href="{{url('user/register')}}">Registrazione</flux:navlist.item>
            </flux:navlist>
        </flux:sidebar>

    </nav>
</header>

