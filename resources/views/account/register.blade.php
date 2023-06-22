@extends('rapidez::layouts.app')

@section('title', __('rapidez-ct::frontend.account.register'))

@section('robots', 'NOINDEX,NOFOLLOW')

@section('content')
    <div class="container">
        <x-rapidez-ct::layout>
            <x-rapidez-ct::title href="/login">
                @lang('rapidez-ct::frontend.account.register')
            </x-rapidez-ct::title>

            <x-rapidez-ct::sections>
                @include('rapidez-ct::account.partials.register-account')
                @include('rapidez-ct::components.newsletter')
            </x-rapidez-ct::sections>

            <x-rapidez-ct::toolbar>
                <x-rapidez-ct::button.outline href="/login">
                    @lang('Back to login')
                </x-rapidez-ct::button.outline>
                <x-rapidez-ct::button.accent
                    form="register"
                    type="submit"
                >
                    @lang('Register')
                </x-rapidez-ct::button.accent>
            </x-rapidez-ct::toolbar>

            <x-slot:sidebar>
                @include('rapidez-ct::account.partials.account-features')
            </x-slot:sidebar>
        </x-rapidez-ct::layout>
    </div>
@endsection
