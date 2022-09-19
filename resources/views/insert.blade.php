@extends('layouts.layout')

@section('insertPokemon')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <h1 class="text-gray-400">Insert a new Pokemon</h1>
        </div>

        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0 bg-white dark:bg-gray-800 shadow sm:rounded-lg" style="padding: 10px 0">
            <a href="{{ url('/') }}" class="btn dark:bg-gray-900 dark:text-white sm:rounded-lg" style="margin-left: 10px; display: flex; align-items: center; gap: 10px">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                <span>Go Back</span>
            </a>
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
                                    <label class="text-gray-600 dark:text-gray-400 text-sm" for="description">Description:</label><br/>
                                    <textarea rows="5" cols="30" type="text" name="description"></textarea>
                                </div>

                                <div class="form-field">
                                    <input type="file" name="imageUrl" class="form-control">
                                </div>

                                <div class="form-field">
                                    <label class="text-gray-600 dark:text-gray-400 text-sm" for="type">Type:</label>
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
