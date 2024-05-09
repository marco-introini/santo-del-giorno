<div>

    <x-titolo>Cerca per nome</x-titolo>

    <div class="flex flex-row items-center">
        <div class="mr-5">Cerca per nome:</div>
        <input
            class="px-3 py-1 border-violet-900 border border-solid rounded-xl"
            name="search"
            wire:keyup="cercaPerNome" wire:model="nome"/>
    </div>

    <div class="mt-6">

        <x-tabella-santi :santi="$santi"/>

    </div>

    <div>
        {{$santi->links()}}
    </div>

</div>
