@extends('layouts.layout')

@section('login')

<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <h1 class="text-gray-400">api-pokedex</h1>
            <img style="height: 48px; margin-left: 18px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAAD2klEQVRoge2ZX2hbVRzHP+emaUyTmzXF/rEyOinDuW4wfGhnQVBLKQmVCVoUfNhw/mMuwp7EQWFPkb2oTBEsPglTNA86rA1DBuKg4h7swHb60EmnXdq062Kbpm2a3nt8sIm5TSK5NwlVuZ+ne07O7/y+v/O793fuuQEbGxsbmwoQZgbLx/Ci8R5wDPBXwX8CuISDkPiWVSsT1JkarXMeOGHFUQn8wAl01oDXrExgLgOPsgA07+z//Kkwc60HTDlun/+FoUtns81FcZUWUxNsYy4DeeKf2+hiQlMBOGVSPECszWBTsCjlYjaAHFnx+XT1PlmW7dT4V1bdFqBUbaZdwg5gt7ED2G3sAHYby/vAw0qSH3XjXlDN+l4ulgP41D2Vu47M/UzsvodM2d8/f8OqawNm34VkVbwWE3LVnJYs//lnwFLUNw9VLxOdk9Y0ZPl/Z2Do9PBh6dh6EZ0+hNgXmQh7aibE4jNQtAoFQiFXg6K+I6X2ClIolSW5thQEEAiFXF6hRqXk8XInqcKJjJ6BY8WeqxQwKaS46HekR6LRaHrngIIAPEJ9V/K3+GRiiYXZ31hfXeFB7WhRMVU4kZXCA/RIIXvu6vUvPDI4OPj96Ojt/AGGAIZODx+WaC9n2/HfZ4jf+rVsUdU4kdU5nTQ2t3GPxwvARirF8p04mc30ET3jGA0EAkfzM2GoQrqincz2pZYTBeLHr1xm/MrlMsMxT53TSWtHJ27Vh1AUhKLgVlVaOh6gzukEOLKkO18y2OQ3BPRnrxdjszUTWorG5jYUh4P2/dP0BKNICdfGgsSmO9nT3MpSbBYhxfPA+1kbQwaeffP8wf7jHwOwnlzO9e9c+VplInvbdAeiuNUkDb4k3cGo4TcEh/JtCjYyKbdrpvi31c6cHj2/13ALffbWGzeAgwBur49MehGA3r4BgNyqZ9vVZiOVwq2qXBsL0h0cAwQ/fB0EIJ3a/vIoMbzGGgKQ8I3YDuDe9r2sLC3WRGgplu/EcXkaiE138uWFUK5f1zQSC3N/aRTyYr6NsQrBR4AG4N3TSFtHp8FBb99AzVYfILOZJj5zk7XkMrquoesa68kV5mem0ba2AK6nfK6RfBtDBr64EJ585vWzHwKnAFr2dtDgVVm4fYu15Aq6pv2jgGqcyLYyGZaKV8DrilMbnIpENvM7C3Zi0VR/RibSB5DiCQCvvwmvvwmAyES4qNNKT2R/CFepYavATxL5ScrnGtkpHkq8jQ6dO1cv726+DbwKOHJCSwRQMYIPxHc1+Lz+9JnhLqFpJwX0S9gXmQh7rSksScV/cNjY2NjYVMSfG4dLtVJLpDQAAAAASUVORK5CYII=">
        </div>

        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0 dark:bg-gray-800 shadow sm:rounded-lg" style="padding: 10px 0">
            <a href="{{ url('/') }}" class="default-button dark:bg-gray-900 dark:text-white sm:rounded-lg" style="margin-left: 10px; display: flex; align-items: center; gap: 10px">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
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
