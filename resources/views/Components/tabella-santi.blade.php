@props([
    /** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Santo[] */
    'santi'
])

<x-titolo class="text-xl">Santi del giorno</x-titolo>
<table class="w-full">
    <tr>
        <td class="px-3 py-1">Nome</td>
        <td class="px-3 py-1">Giorno</td>
        <td class="px-3 py-1">Mese</td>
        <td class="px-3 py-1">Note</td>
    </tr>
    @foreach($santi as $santo)
        <tr class="odd:bg-violet-100 even:bg-violet-200">
            <td class="px-3 py-1">{{$santo->nome}}</td>
            <td class="px-3 py-1">{{$santo->giorno}}</td>
            <td class="px-3 py-1">{{$santo->mese}}</td>
            <td class="px-3 py-1">{{$santo->note}}</td>
        </tr>
    @endforeach
</table>
