<x-template>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:gap-8">
            <div class="">
                <img src="/images/logo.webp"
                     alt="Santo del giorno"
                     class="h-full w-fit flex-1 rounded-[10px] object-top object-cover"
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
                    La registrazione è necessaria per consentire il monitoraggio degli accessi e la gestione della
                    sicurezza
                </div>
            </div>
        </div>


        <div class="mt-12">
            Il progetto prevede l'importazione di più fonti dati. Al momento, anche per motivi di copyright, i dati
            vengono
            presi esclusivamente da
            <a href="https://it.cathopedia.org/wiki/Cathopedia:Pagina_principale"
               class="text-violet-950 underline hover:text-amber-600" target="_blank">Cathopedia</a>
            la Wikipedia Cattolica

        </div>

        <div class="mt-12">
            <article class="prose max-w-none">

                @php
                    $commonmark = new \League\CommonMark\CommonMarkConverter();
                    $file = base_path().'/documentazione.md';
                    $contents = file_get_contents($file);

                    echo $commonmark->convert($contents);
                @endphp
            </article>
        </div>

</x-template>
