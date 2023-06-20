<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\City;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Auth::user()->profile;
        $events = Auth::user()->events;
        $cities = City::all();
        return view('user.profile.index', compact(['profile', 'events', 'cities']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view('user.profile.create', compact(['cities']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {
        $profile = Profile::query()->create([
            'user_id' => Auth::id(),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'city_id' => $request->input('city_id'),
            'description' => $request->input('description'),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        $profile->update([
            'user_id' => 1,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'description' => $request->input('description'),
            'city_id' => $request->input('city_id'),
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }

    public  function upload (Request $request){
        if ($request->hasFile('background_url')){
            $pathPhoto = Storage::disk('public')->putFile('images/backgrounds', $request->file('background_url'));
            Auth::user()->profile->update([
                'background_url' => $pathPhoto,
            ]);
        }
        if ($request->hasFile('photo_url')){
            $pathPhoto = Storage::disk('public')->putFile('images/avatars', $request->file('photo_url'));
            Auth::user()->profile->update([
                'photo_url' => $pathPhoto,
            ]);
        }
        return redirect()->back();
    }
}
