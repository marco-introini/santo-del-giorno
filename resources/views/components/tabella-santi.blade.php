@props([
    /** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Santo[] */
    'santi'
])

<x-titolo class="text-xl">Santi del giorno</x-titolo>
<table class="w-full ">
    <tr>
        <td class="px-3 py-3 text-lg font-bold bg-violet-300">Nome</td>
        <td class="px-3 py-3 text-lg font-bold bg-violet-300">Giorno</td>
        <td class="px-3 py-3 text-lg font-bold bg-violet-300">Mese</td>
        <td class="px-3 py-3 text-lg font-bold bg-violet-300">Onomastico</td>
        <td class="px-3 py-3 text-lg font-bold bg-violet-300">Onomastico Secondario</td>
        <td class="px-3 py-3 text-lg font-bold bg-violet-300">Note</td>
    </tr>
    @foreach($santi as $santo)
        <tr class="odd:bg-violet-100 even:bg-violet-200" wire:key="{{$santo->id}}">
            <td class="px-3 py-3">{{$santo->nome}}</td>
            <td class="px-3 py-3">{{$santo->giorno}}</td>
            <td class="px-3 py-3">{{$santo->mese}}</td>
            <td class="px-3 py-3">
                @if($santo->onomastico)
                    <x-heroicon-o-check-circle class="text-green-900 max-w-6 mx-auto"/>
                @else
                    <x-heroicon-o-x-circle class="text-red-900 max-w-6 mx-auto"/>
                @endif
            </td>

            <td class="px-3 py-3">
                @if($santo->onomastico_secondario)
                    <x-heroicon-o-check-circle class="text-green-900 max-w-6 mx-auto"/>
                @else
                    <x-heroicon-o-x-circle class="text-red-900 max-w-6 mx-auto"/>
                @endif</td>
            <td class="px-3 py-3">{{$santo->note}}</td>
        </tr>
    @endforeach
</table>
