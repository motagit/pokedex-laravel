@extends('layouts.layout')

@section('details')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0 dark:bg-gray-800 shadow sm:rounded-lg" style="padding: 10px 0">
            <a href="{{ url('/') }}" class="default-button dark:bg-gray-900 dark:text-white sm:rounded-lg" style="margin-left: 10px; display: flex; align-items: center; gap: 10px">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                <span>Go Back</span>
            </a>

            @if (Auth::check())
            <form action="/pokemon/{{ $pokemon->id }}" method="POST" style="margin-bottom: 0; margin-left: 10px">
                @csrf
                @method('DELETE')
                <button class="default-button bg-red-900 dark:text-white sm:rounded-lg" style="font-size: 16px; display: flex; align-items: center; gap: 10px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
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
