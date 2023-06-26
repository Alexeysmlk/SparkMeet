<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.user.index', compact(['users']));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact(['user']));
    }

    public function changeRole(Request $request, User $user)
    {
        $currentRole = $user->roles->first()->name;
        $newRole = $currentRole === 'admin' ? 'user' : 'admin';
        $user->syncRoles([$newRole]);

        return back();
    }
}
