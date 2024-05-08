<x-template>
    <div class="text-black/50 dark:bg-black dark:text-white/50">
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:justify-center lg:col-start-2">

                    </div>


                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
<x-link href="{{url('user')}}"/>
                        @else
                            <a
                                href="{{ url('user/login') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Effettua Log In
                            </a>

                            <a
                                href="{{ url('user/register') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Registrazione utente
                            </a>
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
                        </div>
                    </div>

                    <div class="mt-12">
                        <div class="mx-auto font-extrabold text-3xl">
                            Documentazione
                        </div>
                    </div>


                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    &copy; Marco Introini, 2024 - Open Source Software<br>
                    <div class="font-black mt-4">Il codice sorgente è
                        <a class="underline hover:text-azzurro text-amber-600"
                            href="https://github.com/marco-introini/santo-del-giorno">
                            visibile qui</a></div>
                </footer>
            </div>
        </div>
    </div>
</x-template>
