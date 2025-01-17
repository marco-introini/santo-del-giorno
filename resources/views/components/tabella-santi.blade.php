@props([
    /** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Santo[] */
    'santi'
])



<flux:table>
    <flux:columns>
        <flux:column>Santo</flux:column>
        <flux:column>Giorno</flux:column>
        <flux:column>Mese</flux:column>
        <flux:column>Onomastico</flux:column>
        <flux:column>Note</flux:column>
    </flux:columns>

    <flux:rows>
        @foreach ($santi as $santo)
            <flux:row :key="$santo->id">
                <flux:cell class="flex items-center gap-3">
                    {{ $santo->nome }}
                </flux:cell>

                <flux:cell class="whitespace-nowrap">{{ $santo->giorno }}</flux:cell>
                <flux:cell class="whitespace-nowrap">{{ $santo->mese }}</flux:cell>

                <flux:cell variant="strong">
                    @if($santo->onomastico)
                        <flux:badge color="emerald">Onomastico</flux:badge>
                    @endif
                    @if($santo->onomastico_secondario)
                        <flux:badge color="yellow">Onomastico Secondario</flux:badge>
                    @endif
                </flux:cell>
                <flux:cell variant="strong">{{ $santo->note }}</flux:cell>

            </flux:row>
        @endforeach
    </flux:rows>
</flux:table>
