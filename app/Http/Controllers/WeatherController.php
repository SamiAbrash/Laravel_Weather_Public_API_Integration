<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {
        $city = $request->query('city', 'Beirut');
        $apiKey = env('OPENWEATHER_API_KEY');
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";
     
        $response = Http::get($url);

        if ($response->successful())
        {
            return response()->json($response->json());
        }
        else
        {
            return response()->json(['error' => 'could not fetch weather data'], $response->status());
        }
    }
}
