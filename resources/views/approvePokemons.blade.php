@extends('layouts.layout')

@section('approvePokemons')
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <h2 class="text-gray-400">
                    <i class="bi bi-gear"></i>
                    <span>Manage Pokemons</span>
                </h2>
            </div>

            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0 dark:bg-gray-800 shadow sm:rounded-lg"
                style="padding: 10px 0;">
                <a href="{{ url('/') }}" class="default-button dark:bg-gray-900 dark:text-white sm:rounded-lg"
                    style="margin-left: 10px; display: flex; align-items: center; gap: 10px">
                    <i class="bi bi-arrow-left"></i>
                    <span>Go Back</span>
                </a>
            </div>

            <div class="mt-8 dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1">
                    @if ($pokemons->count() == 0)
                        <div class="p-4 text-lg leading-7 font-semibold">
                            <span class="text-gray-900 dark:text-white">There is no pokemons to approve.</span>
                        </div>
                    @else
                        <div style="width: 900px; padding: 20px">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Type</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($pokemons as $pokemon)
                                        <tr>
                                            <th scope="row">{{ $pokemon->id }}</th>
                                            <td><img class="pokemon-image" src="data:image/png;base64, {{ $pokemon->imageUrl }}" alt="{{ $pokemon->name }}"></td>
                                            <td>{{ $pokemon->name }}</td>
                                            <td>
                                                <span class="text-white text-sm">
                                                    @foreach ($pokemon->types as $type)
                                                        {{ $type->name }}
                                                    @endforeach
                                                </span>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <form class="col-md-3" action="/approvePokemon/{{ $pokemon->id }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="mr-2 btn btn-success dark:text-white sm:rounded-lg"
                                                            style="display: flex; align-items: center; gap: 10px">
                                                            <i class="bi bi-check2"></i>
                                                            <span>Approve</span>
                                                        </button>
                                                    </form>

                                                    <form class="col-md-3 ml-2" action="/pokemon/{{ $pokemon->id }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" href="{{ url('/') }}" class="btn btn-danger dark:text-white sm:rounded-lg"
                                                            style="display: flex; align-items: center; gap: 10px">
                                                            <i class="bi bi-x-lg"></i>
                                                            <span>Reprove</span>
                                                        </button>
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
