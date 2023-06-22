<graphql-mutation
    v-cloak
    query="mutation reset($email: String!, $token: String!, $password: String!) { resetPassword ( email: $email, resetPasswordToken: $token, newPassword: $password ) }"
    :variables="{ token: '{{ request()->token }}' }"
    :clear="true"
    :notify="{ message: '@lang('rapidez-ct::frontend.notifications.password_reset.complete')' }"
>
    <x-rapidez-ct::card.inactive slot-scope="{ mutate, variables }">
        <form class="space-y-5" v-on:submit.prevent="mutate">
            <x-rapidez-ct::input
                name="token"
                v-model="variables.token"
                label="Security token"
                required
            />
            <x-rapidez-ct::input
                name="email"
                type="email"
                label="Email"
                v-model="variables.email"
                required
            />
            <x-rapidez-ct::input
                name="password"
                type="password"
                v-model="variables.password"
                label="New password"
                required
            />
            <x-rapidez-ct::button.accent type="submit" class="w-full">
                @lang('rapidez-ct::frontend.account.change_password')
            </x-rapidez-ct::button.accent>
        </form>
    </x-rapidez-ct::card.inactive>
</graphql-mutation>
