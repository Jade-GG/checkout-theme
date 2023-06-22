<input type="checkbox" id="popup" class="peer hidden"/>
<div class="fixed inset-0 opacity-0 transition z-50 flex justify-center items-center pointer-events-none peer-checked:opacity-100 peer-checked:pointer-events-auto">
    <x-rapidez-ct::sections class="relative z-10">
        <section>
            <x-rapidez-ct::title class="mb-5">@lang('rapidez-ct::frontend.checkout.credentials.addresses')</x-rapidez-ct::title>
            <label class="absolute cursor-pointer top-7 right-7 w-5 h-5" for="popup">
                <x-heroicon-o-x/>
            </label>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <x-rapidez-ct::card.address
                    v-for="userAddress in $root.user.addresses"
                    v-bind:key="userAddress.id"
                    v-bind:address="userAddress"
                    v-bind:billing="isType('billing', userAddress)"
                    v-bind:shipping="isType('shipping', userAddress)"
                    dynamic-type
                    check="isType('billing', userAddress) || isType('shipping', userAddress)"
                    class="w-full sm:min-w-[350px]"
                >
                    <x-rapidez-ct::button.link v-if="!isType('shipping', userAddress)" v-on:click.prevent="select('shipping', userAddress)">
                        @lang('rapidez-ct::frontend.checkout.credentials.select_shipping')
                    </x-rapidez-ct::button.link>
                    <x-rapidez-ct::button.link v-if="!isType('billing', userAddress)" v-on:click.prevent="select('billing', userAddress)">
                        @lang('rapidez-ct::frontend.checkout.credentials.select_billing')
                    </x-rapidez-ct::button.link>
                </x-rapidez-ct::card.address>
            </div>
        </section>
    </x-rapidez-ct::sections>
    <label class="absolute cursor-pointer inset-0 bg-ct-primary/60" for="popup"></label>
</div>