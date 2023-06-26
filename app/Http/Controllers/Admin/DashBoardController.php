<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use App\Services\WeatherService;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    public function index(WeatherService $weatherService)
    {
        $user = Auth::user();
        $users = User::all();
        $last_users = User::orderBy('created_at', 'desc')->take(5)->get();
        $events = Event::all();
        $last_events = Event::orderBy('created_at', 'desc')->take(5)->get();
        $weather = $weatherService->getCurrentWeather($user->profile->city->name);
        $weatherIcons = [
            1000 => 'fas fa-sun',
            1003 => 'fas fa-cloud-sun',
            1006 => 'fas fa-cloud',
            1009 => 'fas fa-cloud',
            1030 => 'fas fa-smog',
            1063 => 'fas fa-cloud-showers-heavy',
            1066 => 'fas fa-snowflake',
            1069 => 'fas fa-cloud-meatball',
            1072 => 'fas fa-cloud-rain',
            1087 => 'fas fa-bolt',
            1114 => 'fas fa-snowflake',
            1117 => 'fas fa-snowflake',
            1135 => 'fas fa-smog',
            1147 => 'fas fa-smog',
            1150 => 'fas fa-cloud-rain',
            1153 => 'fas fa-cloud-rain',
            1168 => 'fas fa-cloud-rain',
            1171 => 'fas fa-cloud-rain',
            1180 => 'fas fa-cloud-showers-heavy',
            1183 => 'fas fa-cloud-showers-heavy',
            1186 => 'fas fa-cloud-showers-heavy',
            1189 => 'fas fa-cloud-showers-heavy',
            1192 => 'fas fa-cloud-showers-heavy',
            1195 => 'fas fa-cloud-showers-heavy',
            1198 => 'fas fa-cloud-rain',
            1201 => 'fas fa-cloud-rain',
            1204 => 'fas fa-cloud-meatball',
            1207 => 'fas fa-cloud-meatball',
            1210 => 'fas fa-snowflake',
            1213 => 'fas fa-snowflake',
            1216 => 'fas fa-snowflake',
            1219 => 'fas fa-snowflake',
            1222 => 'fas fa-snowflake',
            1225 => 'fas fa-snowflake',
            1237 => 'fas fa-icicles',
            1240 => 'fa-solid fa-cloud-sun-rain',
            1243 => 'fa-solid fa-cloud-showers',
            1246 => 'fa-solid fa-thunderstorm',
            1249 => 'fa-solid fa-cloud-sleet',
            1252 => 'fa-solid fa-cloud-hail-mixed',
            1255 => 'fa-solid fa-cloud-snow',
            1258 => 'fa-solid fa-snow-blowing',
            1261 => 'fa-solid fa-thunderstorm',
            1264 => 'fa-solid fa-thunderstorm',
            1273 => 'fa-solid fa-thunderstorm',
            1276 => 'fa-solid fa-thunderstorm',
            1279 => 'fa-solid fa-thunderstorm-snow',
            1282 => 'fa-solid fa-thunderstorm'
        ];
        return view('admin.dashboard.index', compact(['user', 'users', 'last_users', 'weather', 'weatherIcons', 'events', 'last_events']));
    }
}
