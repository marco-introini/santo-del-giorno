<div>


    <flux:heading size="xl">Cerca per Data</flux:heading>
    <div class="mt-4 flex flex-col md:flex-row gap-8">
        <div class="flex flex-row items-center max-w-fit gap-4">
            <flux:select variant="listbox" class="mr-3" wire:model.live="mese" label="Mese">
                @for($i=1;$i<=12;$i++)
                    <flux:option>{{$i}}</flux:option>
                @endfor
            </flux:select>
            <flux:select variant="listbox" class="mr-3" wire:model.live="giorno" label="Giorno">
                @for($i=1;$i<=31;$i++)
                    <flux:option>{{$i}}</flux:option>
                @endfor
            </flux:select>
        </div>
        <div class="w-full flex flex-col gap-2">
            <flux:heading size="lg">Onomastici</flux:heading>
            <flux:separator />
            <flux:heading>Primari</flux:heading>
            <ul>
                @foreach($onomasticiPrimari as $santo)
                    <li>{{$santo->nome}}</li>
                @endforeach
            </ul>
            <flux:heading class="mt-2">Secondari</flux:heading>
            <ul>
                @foreach($onomasticiSecondari as $santo)
                    <li>{{$santo->nome}}</li>
                @endforeach
            </ul>
        </div>
    </div>


    <div class="mt-6">

        <x-tabella-santi :santi="$santi"/>

    </div>

</div>
