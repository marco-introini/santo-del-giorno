<div>

    <flux:heading size="xl">Cerca per Nome</flux:heading>

    <div class="flex flex-col md:flex-row items-center gap-8 mt-8">
        <flux:input class="md:w-1/2" wire:model="nome" wire:keyup="cercaPerNome"  placeholder="Cerca per nome" />

        <flux:checkbox class="md:w-1/2" wire:model="onomastico" wire:change="cercaPerNome" name="onomastico" id="onomastico" label="Solo Onomastico" />
    </div>

    <div class="mt-6">

        <x-tabella-santi :santi="$santi"/>

    </div>

    <div>
        {{$santi->links()}}
    </div>

</div>
