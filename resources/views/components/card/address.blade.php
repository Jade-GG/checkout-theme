@props(['customTitle' => null])

<x-rapidez-ct::card.white {{ $attributes->only('v-if') }}>
    <x-rapidez-ct::address {{ $attributes }} :$customTitle>
        {{ $slot }}
    </x-rapidez-ct::address>
</x-rapidez-ct::card.white>