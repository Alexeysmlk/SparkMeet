<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Event;
use App\Models\Profile;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::with('city')
            ->orderBy('date', 'asc')
            ->orderBy('time', 'asc')
            ->paginate(6);
        $categories = Category::all();
        $profile = Auth::user()->profile;
        return view('client.event.index', compact(['events', 'categories', 'profile']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $cities = City::all();
        return view('client.event.create', compact(['categories', 'cities']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $pathPhoto = Storage::disk('public')->putFile('images/events', $photo);
        }

        $date = $request->input('date');
        $time = $request->input('time');
        $formattedDate = Carbon::createFromFormat('m/d/Y', $date)->format('Y-m-d');
        $formattedTime = Carbon::createFromFormat('H:i', $time)->format('H:i:s');

        $event = Event::query()->create([
            'title' => $request->input('title'),
            'photo_url' => $pathPhoto ?? null,
            'user_id' => Auth::id(),
            'category_id' => $request->input('category'),
            'description' => $request->input('description'),
            'city_id' => $request->input('city'),
            'date' => $formattedDate,
            'time' => $formattedTime,
        ]);
        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $user = $event->user;
        $profile = $user->profile;
        $currentUser = Auth::user();
        return view('client.event.show', compact(['event', 'user', 'profile', 'currentUser']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $categories = Category::all();
        $cities = City::all();
        return view('client.event.edit', compact(['event', 'categories', 'cities']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $pathPhoto = Storage::disk('public')->putFile('images/events', $photo);
        }

        $date = $request->input('date');
        $time = $request->input('time');
        $formattedDate = Carbon::createFromFormat('m/d/Y', $date)->format('Y-m-d');
        $formattedTime = Carbon::createFromFormat('H:i', $time)->format('H:i:s');

        $event->update([
            'title' => $request->input('title'),
            'photo_url' => $pathPhoto ?? null,
            'category_id' => $request->input('category'),
            'description' => $request->input('description'),
            'city_id' => $request->input('city'),
            'date' => $formattedDate,
            'time' => $formattedTime,
        ]);
        return redirect()->route('user.profile.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }

    public function like(Request $request, Event $event)
    {
        $user = Auth::user();

        if ($user->likedEvents->contains($event)) {
            $user->likedEvents()->detach($event);
        } else {
            $user->likedEvents()->attach($event);
        }

        return back();
    }
}
