<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Event;
use App\Models\Tag;
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
        $events = Event::orderBy('created_at', 'desc')->with('user.profile', 'city', 'category')->paginate(10);
        return view('admin.event.index', compact(['events']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $cities = City::all();
        $tags = Tag::all();
        return view('admin.event.create', compact(['categories', 'cities', 'tags']));
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

        $event->tags()->sync($request->tags);

        return redirect()->route('admin.events.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('admin.event.show', compact(['event']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $categories = Category::all();
        $cities = City::all();
        $tags = Tag::all();
        return view('admin.event.edit', compact(['event', 'categories', 'cities', 'tags']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
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

        if ($request->has('tags')) {
            $event->tags()->sync($request->tags);
        }

        return redirect()->route('admin.events.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->back();
    }
}
