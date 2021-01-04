@extends('layouts.login_app')

@section('content')

    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-5 logo-side">
                <a href="{{ url('/') }}">
                    <img src="{{'/img/logo2.png'}}" width="100%">
                </a>

            </div>
            <div class="col-md-7 card">

                <div class="card-header" dir="rtl">
                    {{ __('auth.Login') }}
                </div>

                    @isset($url)
                        <form method="POST" class="d-flex flex-column justify-content-around"
                        action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                    @else
                        <form method="POST" class="d-flex flex-column justify-content-around"
                        action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @endisset

                    @csrf
                   

                    <div class="form-group d-flex justify-content-center ">
                        {{-- <label for="email" class="col-md-4 col-form-label text-md-right">
                            {{ __('E-Mail Address') }}</label> --}}

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required
                                autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group d-flex justify-content-center">
                        {{-- <label for="password"
                            class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                        --}}

                        <div class="col-md-6">
                            <input id="password" type="password" placeholder="{{ __('Password') }}"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12 d-flex justify-content-center align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <div class="col-md-5 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            <div class="col-md-5 d-flex justify-content-center">
                                <a type="submit" class="btn btn-outline-secondary" href="{{url('register/customer')}}">
                                    {{ __('Register') }}
                                </a>
                            </div>
                        </div>

                    </div>


                </form>
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ url('locale/ar') }}" type="button" id="ar"
                                class="btn btn-secondary translate">عربي</a>
                            <a href="{{ url('locale/en') }}" type="button" id="eng"
                                class="btn btn-secondary translate">English</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
