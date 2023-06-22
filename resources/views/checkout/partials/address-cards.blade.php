<div class="grid gap-5 grid-cols-1 sm:grid-cols-2">
    <template v-if="hideBilling">
        <x-rapidez-ct::card.address v-bind:address="checkout.shipping_address" shipping billing check>
            <x-rapidez-ct::button.link v-on:click.prevent="toggleEdit">
                @lang('rapidez-ct::frontend.checkout.credentials.edit_address')
            </x-rapidez-ct::button.link>
        </x-rapidez-ct::card.address>
        <button
            v-on:click.prevent="toggleEdit"
            class="h-full flex flex-col items-center justify-center gap-y-2 font-medium bg-ct-border rounded max-sm:hidden"
        >
            <span>+</span>
            <span>@lang('rapidez-ct::frontend.checkout.credentials.new_address')</span>
        </button>
    </template>
    <template v-else>
        <x-rapidez-ct::card.address v-bind:address="checkout.shipping_address" shipping check>
            <x-rapidez-ct::button.link v-on:click.prevent="toggleEdit">
                @lang('rapidez-ct::frontend.checkout.credentials.edit_address')
            </x-rapidez-ct::button.link>
        </x-rapidez-ct::card.address>
        <x-rapidez-ct::card.address v-bind:address="checkout.billing_address" billing check>
            <x-rapidez-ct::button.link v-on:click.prevent="toggleEdit">
                @lang('rapidez-ct::frontend.checkout.credentials.edit_address')
            </x-rapidez-ct::button.link>
        </x-rapidez-ct::card.address>
    </template>
</div>

@include('rapidez-ct::checkout.partials.address-cards-popup')