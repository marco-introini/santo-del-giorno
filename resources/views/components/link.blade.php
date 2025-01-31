@props([
    'href' => '#'
])

<a href="{{$href}}" class="underline text-violet-600 hover:text-violet-900">{{$slot}}</a>
