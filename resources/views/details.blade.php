@extends('layouts.layout')

@section('details')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0 bg-white dark:bg-gray-800 shadow sm:rounded-lg" style="padding: 10px 0">
            <a href="{{ url('/') }}" class="btn dark:bg-gray-900 dark:text-white sm:rounded-lg" style="margin-left: 10px;">Go Back</a>
        </div>

        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid">
                    <div class="p-6">
                        <div class="flex items-center" style="gap: 6em;">
                            <div>
                                <h1 class="text-gray-400">{{$pokemon->name}}</h1>
                                <div class="text-gray-600 dark:text-gray-400 text-sm font-semibold">
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
