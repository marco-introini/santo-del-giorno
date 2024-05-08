<div>


    <x-titolo>Cerca per Data</x-titolo>
    <div class="flex flex-row items-center">
        <div class="mr-3">Mese</div>
        <select
            class="px-3 py-1 border-violet-900 border border-solid rounded-xl "
            name="mese"
            wire:model.live="mese">
            @for($i=1;$i<=12;$i++)
                <option value="{{$i}}">{{$i}}</option>
            @endfor
        </select>
        <div class="ml-10 mr-3">Giorno</div>
        <select
            class="px-3 py-1 border-violet-900 border border-solid rounded-xl"
            name="giorno"
            wire:model.live="giorno">

            @for($i=1;$i<=31;$i++)
                <option value="{{$i}}">{{$i}}</option>
            @endfor
        </select>
    </div>

    <div class="mt-6">

        <x-tabella-santi :santi="$santi"/>

    </div>

</div>
