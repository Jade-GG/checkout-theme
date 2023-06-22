<checkout-address v-slot="{ useCards, editing, toggleEdit, hideBilling, isType, select }">
    <x-rapidez-ct::card.inactive v-if="useCards && !editing">
        @include('rapidez-ct::checkout.partials.address-cards')
        <div class="mt-5">
            <x-rapidez-ct::button.accent v-on:click.prevent="toggleEdit">
                @lang('rapidez-ct::frontend.checkout.credentials.new_address')
            </x-rapidez-ct::button.accent>
            <x-rapidez-ct::button.outline component="label" for="popup" class="cursor-pointer">
                @lang('rapidez-ct::frontend.checkout.credentials.addresses')
            </x-rapidez-ct::button.outline>
        </div>
    </x-rapidez-ct::card.inactive>

    <x-rapidez-ct::card.inactive v-else>
        @include('rapidez-ct::checkout.partials.shipping-billing-fields', ['type' => 'shipping'])

        <div class="mt-9 pt-7 border-t-2 border-white" v-if="!checkout.hide_billing">
            @include('rapidez-ct::checkout.partials.shipping-billing-fields', ['type' => 'billing'])
        </div>

        <x-rapidez-ct::button.accent class="mt-9" v-if="useCards" v-on:click.prevent="toggleEdit">
            @lang('rapidez-ct::frontend.checkout.credentials.save_address')
        </x-rapidez-ct::button.accent>
    </x-rapidez-ct::card.inactive>
</checkout-address>
