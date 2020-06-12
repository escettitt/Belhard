@extends('layouts.default')

@section('content')
<div class="login__wrapper d-mobile-none">
                <div class="login__header">{{ __('Авторизация') }}</div>

                <div class="login__body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="login__row">

                                <input id="email" type="email" placeholder="example@example.com" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>

                        <div class="login__row">
                                <input id="password" type="password" placeholder="Password" class="form-control @error('email') is-invalid @enderror" name="password" required autocomplete="current-password">
                        </div>
                        <div class="login__row">
                                <button type="submit" class="button button__login">
                                    {{ __('Войти') }}
                                </button>
                        </div>
                    </form>
                </div>
</div>
@endsection
