<x-layouts.base>
    @isset($title)
        <x-slot name="title">{{ $title }}</x-slot>
    @endisset

    {{ $slot }}
</x-layouts.base>