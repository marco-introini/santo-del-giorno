<x-template>
    <div class="">
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:justify-center lg:col-start-2">

                    </div>


                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                            <x-link href="{{url('user')}}">Area Riservata</x-link>
                        @else
                            <x-link href="{{url('user/login')}}" class="mr-3">Effettua Log In</x-link>
                            <x-link href="{{url('user/register')}}">Registrazione Utente</x-link>
                        @endauth
                    </nav>
                </header>

                <main class="mt-6 flex flex-col">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:gap-8">
                        <div class="">
                            <img src="/images/logo.webp"
                                 alt="Santo del giorno"
                                 class="h-full w-fit flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.25)] dark:block"
                            />
                        </div>
                        <div class="place-content-center mx-auto">
                            <div class="font-extrabold text-5xl">Santo del Giorno</div>
                            <div class="mt-4">
                                Un progetto di software libero per avere API semplici e complete per ottenere il santo del giorno.
                            </div>
                            <div class="mt-2">
                                Le chiamate alle API possono essere integrate in <strong>qualunque progetto (anche
                                    commerciale)</strong> in modo <strong>completamente gratuito</strong>.
                                La registrazione è necessaria per consentire il monitoraggio degli accessi e la gestione della sicurezza
                            </div>
                        </div>
                    </div>

                    <div class="mt-12">
                        <div class="mx-auto font-extrabold text-3xl">
                            Documentazione
                        </div>
                    </div>


                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    <div>&copy; Marco Introini, 2024 - Open Source Software<br></div>
                    <div class="mt-3">
                        <x-link href="https://github.com/marco-introini/santo-del-giorno" class="mt-3">Codice Sorgente
                        </x-link>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</x-template>
