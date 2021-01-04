@extends('layouts.login_app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 logo-side">
                <a href="{{ url('/') }}">
                    <img src="{{ '/img/logo2.png' }}" width="100%">
                </a>

            </div>
            <div class="col-md-7 card">
                <div class="card-header"> {{ isset($url) ? ucwords($url) : '' }} {{ __('Register') }}</div>


                    @isset($url)
                        <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
                        @else
                            <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                            @endisset
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="number"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-md-5 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>

                                <div class="col-md-5 d-flex justify-content-center">
                                    <a type="submit" class="btn btn-outline-secondary" href="{{url('login/customer')}}">
                                        {{ __('Login') }}
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ url('locale/ar') }}" type="button" id="ar"
                                            class="btn btn-secondary translate">عربي</a>
                                        <a href="{{ url('locale/en') }}" type="button" id="eng"
                                            class="btn btn-secondary translate">English</a>
                                    </div>
                                </div>
                        </form>
                        
                </div>
            </div>
        </div>
    </div>
@endsection
