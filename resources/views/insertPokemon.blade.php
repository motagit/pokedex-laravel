@extends('layouts.layout')

@section('insertPokemon')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <h1 class="text-gray-400">Insert a new Pokemon</h1>
        </div>

        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0 bg-white dark:bg-gray-800 shadow sm:rounded-lg" style="padding: 10px 0">
            <a href="{{ url('/') }}" class="btn dark:bg-gray-900 dark:text-white sm:rounded-lg" style="margin-left: 10px;">Go Back</a>
        </div>

        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <form action="/pokemon" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-field">
                                    <label class="text-gray-600 dark:text-gray-400 text-sm" for="name">Name:</label>
                                    <input type="text" name="name">
                                </div>

                                <div class="form-field">
                                    <input type="file" name="imageUrl" class="form-control">
                                </div>

                                <div class="form-field">
                                    <label class="text-gray-600 dark:text-gray-400 text-sm" for="name">Type:</label>
                                    <select name="type" id="types">
                                        @foreach ($types as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input class="btn dark:bg-gray-900 dark:text-white sm:rounded-lg mt-8" type="submit" value="Submit">
                            </form>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
