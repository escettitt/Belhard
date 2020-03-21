@extends('layouts.default')

@section('content')
<div class="login__wrapper">
                <div class="login__header">{{ __('Login') }}</div>

                <div class="login__body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="login__row">

                                <input id="email" type="email" placeholder="example@example.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="login__row">
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
