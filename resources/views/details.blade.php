@extends('layouts.layout')

@section('details')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0 dark:bg-gray-800 shadow sm:rounded-lg" style="padding: 10px 0">
            <a href="{{ url('/') }}" class="default-button dark:bg-gray-900 dark:text-white sm:rounded-lg" style="margin-left: 10px; display: flex; align-items: center; gap: 10px">
                <i class="bi bi-arrow-left"></i>
                <span>Go Back</span>
            </a>

            @if (Auth::check())
            <form action="/pokemon/{{ $pokemon->id }}" method="POST" style="margin-bottom: 0; margin-left: 10px">
                @csrf
                @method('DELETE')
                <button class="default-button bg-red-900 dark:text-white sm:rounded-lg" style="font-size: 16px; display: flex; align-items: center; gap: 10px">
                    <i class="bi bi-trash"></i>
                    <span>Delete</span>
                </button>
            </form>
            @endif
        </div>

        <div class="mt-8 dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid">
                    <div class="p-6">
                        <div class="flex items-center" style="gap: 6em;">
                            <div>
                                <h1 class="text-gray-400 font-semibold">{{$pokemon->name}}</h1>
                                <div class="text-gray-600 dark:text-gray-400 text-sm">
                                    @foreach ($pokemon->types as $type)
                                        <span>{{$type->name}}</span>
                                    @endforeach
                                </div>
                            </div>
                            <img class="pokemon-image" src="data:image/png;base64, {{$pokemon->imageUrl}}" alt="{{$pokemon->name}}">
                        </div>
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm" style="width: 26em;">
                            {{$pokemon->description}}
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
