@props([
    /** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Santo[] */
    'santi'
])



<flux:table>
    <flux:table.columns>
        <flux:table.column>Santo</flux:table.column>
        <flux:table.column>Giorno</flux:table.column>
        <flux:table.column>Mese</flux:table.column>
        <flux:table.column>Onomastico</flux:table.column>
        <flux:table.column>Note</flux:table.column>
    </flux:table.columns>

    <flux:table.rows>
        @foreach ($santi as $santo)
            <flux:table.row :key="$santo->id">
                <flux:table.cell class="flex items-center gap-3">
                    {{ $santo->nome }}
                </flux:table.cell>

                <flux:table.cell class="whitespace-nowrap">{{ $santo->giorno }}</flux:table.cell>
                <flux:table.cell class="whitespace-nowrap">{{ $santo->mese }}</flux:table.cell>

                <flux:table.cell variant="strong">
                    @if($santo->onomastico)
                        <flux:badge color="emerald">Onomastico</flux:badge>
                    @endif
                    @if($santo->onomastico_secondario)
                        <flux:badge color="yellow">Onomastico Secondario</flux:badge>
                    @endif
                </flux:table.cell>
                <flux:table.cell variant="strong">{{ $santo->note }}</flux:table.cell>

            </flux:table.row>
        @endforeach
    </flux:table.rows>
</flux:table>
