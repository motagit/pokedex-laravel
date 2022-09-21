@extends('layouts.layout')

@section('insertPokemon')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <h2 class="text-gray-400">
                <i class="bi bi-plus-circle"></i>
                <span>Insert Pokemon</span>
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
                    <form action="/pokemon" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3 mt-4">
                            <label for="name" class="col-md-3 col-form-label text-md-end text-white">{{ __('Name') }}</label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-3 col-form-label text-md-end text-white">{{ __('Description') }}</label>

                            <div class="col-md-9">
                                <textarea rows="3" id="description" class="form-control" name="description" required>
                                </textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="imageUrl" class="col-md-3 col-form-label text-md-end text-white">{{ __('Image') }}</label>

                            <div class="col-md-9">
                                <input type="file" name="imageUrl" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="type" class="col-md-3 col-form-label text-md-end text-white">{{ __('Type') }}</label>

                            <div class="col-md-9">
                                <select name="type" id="types" class="form-select" required>
                                    @foreach ($types as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12 offset-md-3">
                                <button type="submit" class="default-button dark:bg-gray-900 dark:text-white sm:rounded-lg" style="font-size: 14px">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
