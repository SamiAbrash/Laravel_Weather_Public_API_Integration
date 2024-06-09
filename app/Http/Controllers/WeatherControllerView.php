<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherControllerView extends Controller
{
    public function index(Request $request)
    {
        $city = $request->input('city', 'London'); // Default city
        $apiKey = env('OPENWEATHER_API_KEY');
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

        $response = Http::get($url);

        if ($response->successful()) {
            $weatherData = $response->json();
            return view('weather', ['weatherData' => $weatherData]);
        } else {
            return view('weather', ['error' => 'Could not fetch weather data']);
        }
    }
}
