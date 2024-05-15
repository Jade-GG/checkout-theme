<login :checkout-login="false" v-slot="{ email, password, go, loginInputChange }" redirect="{{ $redirect ?? route('account.overview') }}">
    <x-rapidez-ct::card.inactive>
        <form class="space-y-5" v-on:submit.prevent="go()">
            <x-rapidez-ct::input
                name="email"
                type="email"
                label="Email"
                v-bind:value="email"
                v-on:input="loginInputChange"
                required
            />
            <x-rapidez-ct::input.password
                name="password"
                label="Password"
                v-bind:value="password"
                v-on:input="loginInputChange"
                required
            />
            <div class="flex items-center justify-between">
                <a href="{{ route('account.forgotpassword') }}" class="text-sm text-ct-inactive underline">
                    @lang('Forgot your password?')
                </a>
                <x-rapidez-ct::button.primary
                    class="flex items-center gap-1"
                    type="submit"
                    dusk="continue"
                    loader
                >
                    @lang('Login')
                    <x-heroicon-o-arrow-right class="h-4" />
                </x-rapidez-ct::button.primary>
            </div>
        </form>
    </x-rapidez-ct::card.inactive>
</login>
