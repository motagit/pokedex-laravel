@extends('layouts.layout')

@section('login')

<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <h2 class="text-gray-400">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </h2>
        </div>

        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0 dark:bg-gray-800 shadow sm:rounded-lg" style="padding: 10px 0">
            <a href="{{ url('/') }}" class="default-button dark:bg-gray-900 dark:text-white sm:rounded-lg" style="margin-left: 10px; display: flex; align-items: center; gap: 10px">
                <i class="bi bi-arrow-left"></i>
                <span>Go Back</span>
            </a>
        </div>

        <div class="container mt-8 dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="row">
                <div class="grid grid-cols-1 p-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-4 mt-4">
                            <label for="email" class="col-md-3 col-form-label text-md-end text-white">{{ __('Email') }}</label>

                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-3 col-form-label text-md-end text-white">{{ __('Password') }}</label>

                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12 offset-md-3">
                                <button type="submit" class="default-button dark:bg-gray-900 dark:text-white sm:rounded-lg" style="font-size: 14px">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('register'))
                                    <a class="btn text-white" href="{{ route('register') }}">
                                        {{ __("Register") }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
