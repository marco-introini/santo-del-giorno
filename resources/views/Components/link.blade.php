@props([
    'href' => '#'
])

<a
        href="{{$href}}"
        {{$attributes->merge(['class' => "rounded-md bg-violet-100 px-3 py-2
        ring-1 ring-transparent hover:ring-opacity-50
        transition
        hover:bg-violet-400/60 hover:text-violet-950
        focus:outline-none focus-visible:ring-[#FF2D20]
        dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"])}}
>
    {{$slot}}
</a>
