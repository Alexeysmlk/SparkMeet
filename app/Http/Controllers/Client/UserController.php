<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeactivateAccountUserRequest;
use App\Http\Requests\UpdateEmailUserRequest;
use App\Http\Requests\UpdatePasswordUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('client.user.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function updateEmail(UpdateEmailUserRequest $request)
    {
        $user = Auth::user();

        if ($request->old_email !== $user->email) {
            return back()->withErrors(['old_email' => 'The old email address is incorrect.']);
        }

        $user->email = $request->new_email;
        $user->email_verified_at = null;
        $user->save();

        return redirect()->route('user.profile.index');
//        return back()->with('status', 'Email updated successfully!');
    }

    public function updatePassword(UpdatePasswordUserRequest $request)
    {
        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'The old password is incorrect.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('user.profile.index');
//        return back()->with('status', 'Password updated successfully!');

    }

    public function deactivateAccount(DeactivateAccountUserRequest $request)
    {
        $user = Auth::user();

        if ($request->email !== $user->email || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'The email or password is incorrect.']);
        }

        Auth::logout();
        $user->delete();

        return redirect()->route('login');
//        return redirect()->route('home')->with('status', 'Account deactivated successfully!');
    }
}
