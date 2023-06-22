@props(['checkout' => true])
<div
    class="flex items-center space-x-[18px] text-xs"
    v-cloak
>
    <span class="whitespace-nowrap font-medium text-ct-inactive">
        @lang('rapidez-ct::frontend.checkout.step', [
            'step' => '@{{ checkout.step }}',
            'total' => count(config('rapidez.checkout_steps.' . config('rapidez.store_code')) ?? config('rapidez.checkout_steps.default')) - 1,
        ])
    </span>
    @foreach (array_slice(config('rapidez.checkout_steps.' . config('rapidez.store_code')) ?? config('rapidez.checkout_steps.default'), 0, -1) as $stepTitle)
        <div
            class="aspect-square w-3 cursor-pointer rounded"
            v-on:click="goToStep({{ $stepTitle == 'Credentials' ? 3 : $loop->index }})"
            :class="{
                'bg-ct-accent': {{ $loop->index + 1 }} <= checkout.step,
                'bg-ct-border': {{ $loop->index + 1 }} > checkout.step,
                'outline-4 outline outline-ct-accent/20': {{ $loop->index + 1 }} === checkout.step
            }"
        >
        </div>
    @endforeach
</div>
