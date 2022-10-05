<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('permissions', ['users' => $users]);
    }

    public function turnAdmin($id)
    {
        $user = User::findOrFail($id);

        if ($user) {
            $user->is_admin = true;
            $user->save();
        }

        return $this->index();
    }
}
