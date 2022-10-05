@extends('layouts.layout')

@section('permissions')
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <h2 class="text-gray-400">
                    <i class="bi bi-person-check"></i>
                    <span>Permissions</span>
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
                    <div style="width: 900px; padding: 20px">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Admin</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->is_admin == 1 ? 'Yes' : 'No' }}</td>
                                        <td>
                                            <div class="row">
                                                <form action="/turnAdmin/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    @if ($user->is_admin == 0)
                                                        <button type="submit" class="mr-2 btn btn-success dark:text-white sm:rounded-lg"
                                                            style="display: flex; align-items: center; gap: 10px">
                                                            <i class="bi bi-check2"></i>
                                                            <span>Turn admin</span>
                                                        </button>
                                                    @endif
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
