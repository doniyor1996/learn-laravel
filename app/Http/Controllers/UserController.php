<?php

namespace App\Http\Controllers;


use App\Models\User;

class UserController extends Controller
{
    public function list()
    {
        $user = auth()->user();

        if ($user->hasRole('superadmin')) {
            $query = User::role(['admin', 'user']);
        } else {
            $query = User::role('user');
        }
        return view('users.index', [
            'list' => $query->get(),
        ]);
    }
}
