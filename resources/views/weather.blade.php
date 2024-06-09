<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Information</title>
</head>
<body>
    <h1>Weather Information</h1>

    <form action="/weather" method="GET">
        <input type="text" name="city" placeholder="Enter city">
        <button type="submit">Get Weather</button>
    </form>

    @if(isset($weatherData))
        <h2>{{ $weatherData['name'] }}</h2>
        <p>Temperature: {{ $weatherData['main']['temp'] }} °C</p>
        <p>Weather: {{ $weatherData['weather'][0]['description'] }}</p>
    @elseif(isset($error))
        <p>{{ $error }}</p>
    @endif
</body>
</html>
