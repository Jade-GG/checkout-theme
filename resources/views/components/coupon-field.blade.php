<graphql-mutation
    :query="'mutation ($cart_id: String!, $coupon_code: String!) { applyCouponToCart(input: { cart_id: $cart_id, coupon_code: $coupon_code }) { cart { ' + config.queries.cart + ' } } }'"
    :variables="{ cart_id: mask, coupon_code: '' }"
    :notify="{ message: config.translations.cart.coupon.applied }"
    :clear="true"
    :watch="false"
    :callback="updateCart"
    :error-callback="checkResponseForExpiredCart"
    v-slot="{ mutate, variables }"
>
    <form v-on:submit.prevent="mutate" class="flex w-full gap-x-3">
        <x-rapidez::input
            :label="false"
            class="text-ct-primary w-60"
            name="couponCode"
            placeholder="Coupon code"
            v-model="variables.coupon_code"
            v-bind:disabled="$root.loading"
            required
        />
        <x-rapidez::button type="submit" class="sm:text-sm">
            @lang('Apply')
        </x-rapidez::button>
    </form>
</graphql-mutation>

<div class="flex w-full gap-x-3">
    <x-rapidez-ct::input
        class="text-ct-primary w-60"
        name="couponCode"
        :placeholder="__('Enter code') . '...'"
        v-on="inputEvents"
        v-bind:value="couponCode"
        v-bind:disabled="$root.loading"
        required
    />
    <x-rapidez-ct::button.outline type="submit" loader>
        @lang('Apply')
    </x-rapidez-ct::button.outline>
</div>
