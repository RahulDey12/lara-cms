<x-layouts.base>
    @isset($title)
        <x-slot name="title">{{ $title }}</x-slot>
    @endisset

    <div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
        {{ $slot }}
    </div>
</x-layouts.base>
