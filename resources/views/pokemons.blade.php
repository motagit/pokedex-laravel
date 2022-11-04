@extends('layouts.layout')

@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <h1 class="text-gray-400">pokedex</h1>
            <img style="height: 48px; margin-left: 18px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAAD2klEQVRoge2ZX2hbVRzHP+emaUyTmzXF/rEyOinDuW4wfGhnQVBLKQmVCVoUfNhw/mMuwp7EQWFPkb2oTBEsPglTNA86rA1DBuKg4h7swHb60EmnXdq062Kbpm2a3nt8sIm5TSK5NwlVuZ+ne07O7/y+v/O793fuuQEbGxsbmwoQZgbLx/Ci8R5wDPBXwX8CuISDkPiWVSsT1JkarXMeOGHFUQn8wAl01oDXrExgLgOPsgA07+z//Kkwc60HTDlun/+FoUtns81FcZUWUxNsYy4DeeKf2+hiQlMBOGVSPECszWBTsCjlYjaAHFnx+XT1PlmW7dT4V1bdFqBUbaZdwg5gt7ED2G3sAHYby/vAw0qSH3XjXlDN+l4ulgP41D2Vu47M/UzsvodM2d8/f8OqawNm34VkVbwWE3LVnJYs//lnwFLUNw9VLxOdk9Y0ZPl/Z2Do9PBh6dh6EZ0+hNgXmQh7aibE4jNQtAoFQiFXg6K+I6X2ClIolSW5thQEEAiFXF6hRqXk8XInqcKJjJ6BY8WeqxQwKaS46HekR6LRaHrngIIAPEJ9V/K3+GRiiYXZ31hfXeFB7WhRMVU4kZXCA/RIIXvu6vUvPDI4OPj96Ojt/AGGAIZODx+WaC9n2/HfZ4jf+rVsUdU4kdU5nTQ2t3GPxwvARirF8p04mc30ET3jGA0EAkfzM2GoQrqincz2pZYTBeLHr1xm/MrlMsMxT53TSWtHJ27Vh1AUhKLgVlVaOh6gzukEOLKkO18y2OQ3BPRnrxdjszUTWorG5jYUh4P2/dP0BKNICdfGgsSmO9nT3MpSbBYhxfPA+1kbQwaeffP8wf7jHwOwnlzO9e9c+VplInvbdAeiuNUkDb4k3cGo4TcEh/JtCjYyKbdrpvi31c6cHj2/13ALffbWGzeAgwBur49MehGA3r4BgNyqZ9vVZiOVwq2qXBsL0h0cAwQ/fB0EIJ3a/vIoMbzGGgKQ8I3YDuDe9r2sLC3WRGgplu/EcXkaiE138uWFUK5f1zQSC3N/aRTyYr6NsQrBR4AG4N3TSFtHp8FBb99AzVYfILOZJj5zk7XkMrquoesa68kV5mem0ba2AK6nfK6RfBtDBr64EJ585vWzHwKnAFr2dtDgVVm4fYu15Aq6pv2jgGqcyLYyGZaKV8DrilMbnIpENvM7C3Zi0VR/RibSB5DiCQCvvwmvvwmAyES4qNNKT2R/CFepYavATxL5ScrnGtkpHkq8jQ6dO1cv726+DbwKOHJCSwRQMYIPxHc1+Lz+9JnhLqFpJwX0S9gXmQh7rSksScV/cNjY2NjYVMSfG4dLtVJLpDQAAAAASUVORK5CYII=">
        </div>

        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0 dark:bg-gray-800 shadow sm:rounded-lg" style="padding: 10px 0;">
            @if (Auth::check())
                <a href="{{ url('insertPokemon') }}" class="default-button dark:bg-gray-900 dark:text-white sm:rounded-lg" style="margin-left: 10px; display: flex; align-items: center; gap: 10px">
                    <i class="bi bi-plus-circle"></i>
                    <span>Insert Pokemon</span>
                </a>

                {{-- user-dropdown --}}
                <a class="ms-auto float-right nav-link dropdown-toggle default-button text-white sm:rounded-lg" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle"></i>
                    <span>Hello, {{ Auth::user()->name }} !</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    @if (Auth::user()->is_admin === true)
                        <li>
                            <a href="{{ route('managePokemons') }}" class="dropdown-item" style="display: flex; align-items: center; gap: 10px">
                                <i class="bi bi-gear"></i>
                                <span>Manage Pokemons</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('permissions') }}" class="dropdown-item" style="display: flex; align-items: center; gap: 10px">
                                <i class="bi bi-person-check"></i>
                                <span>Permissions</span>
                            </a>
                        </li>
                    @endif

                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item" style="display: flex; align-items: center; gap: 10px">
                            <i class="bi bi-box-arrow-in-left"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
                {{--  --}}

            @else
                <a href="{{ route('login') }}" class="default-button dark:bg-gray-900 dark:text-white sm:rounded-lg" style="margin-left: 10px; display: flex; align-items: center; gap: 10px">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Login</span>
                </a>
            @endif

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>

        <div class="mt-8 dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-2">
                @if ($pokemons->count() == 0)
                    <div class="ml-4 pt-8 pb-8 text-lg leading-7 font-semibold"><span class="text-gray-900 dark:text-white">There is no pokemons.</span></div>
                @endif

                @foreach ($pokemons as $pokemon)
                    <a class="p-6 pokemon-item" href="{{ url('/pokemon', $pokemon->id) }}">
                        <div class="flex items-center">
                            <img class="pokemon-image" src="data:image/png;base64, {{$pokemon->imageUrl}}" alt="{{$pokemon->name}}">
                            <div class="ml-4 text-lg leading-7">
                                <span class="font-semibold text-gray-900 text-white">{{$pokemon->name}}</span>
                                <br/>
                                @foreach ($pokemon->types as $type)
                                    <span class="text-white text-sm type-chip" style="background-color: {{ $type->color }}">{{$type->name}}</span>
                                @endforeach
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
