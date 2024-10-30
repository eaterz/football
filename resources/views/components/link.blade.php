@props([
    'href',
    'name'
])

<a href="{{$href}}" class="text-white text-lg font-semibold relative after:content-[''] after:absolute after:left-0 after:bottom-[-18px] after:w-full after:h-1 after:bg-transparent hover:after:bg-white after:transition-all after:duration-200">
    {{$name}}
</a>
