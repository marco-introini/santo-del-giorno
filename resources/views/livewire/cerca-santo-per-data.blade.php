<div>

    <flux:heading size="xl">Cerca per Data</flux:heading>
    <div class="mt-4 flex flex-col md:flex-row gap-8">
        <div class="flex flex-row items-center max-w-fit gap-4">
            <flux:select variant="listbox" class="mr-3" wire:model.live="mese" label="Mese">
                @for($i=1;$i<=12;$i++)
                    <flux:select.option>{{$i}}</flux:select.option>
                @endfor
            </flux:select>
            <flux:select variant="listbox" class="mr-3" wire:model.live="giorno" label="Giorno">
                @for($i=1;$i<=31;$i++)
                    <flux:select.option>{{$i}}</flux:select.option>
                @endfor
            </flux:select>
        </div>
    </div>


    <div class="mt-6">

        <x-tabella-santi :santi="$santi"/>

    </div>

</div>
