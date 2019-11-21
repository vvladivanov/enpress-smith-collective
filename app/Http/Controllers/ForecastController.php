<?php

namespace App\Http\Controllers;

class ForecastController extends Controller
{
    public function forecast() {
        
        $southport = '-27.9748839,153.3818768';

        if (!$apikey = env('DARK_SKY_API_SECRET_KEY')) {
            throw new Exception("DARK_SKY_API_SECRET_KEY is not defined", 1);
        }
        
        if (!$forecast = wp_cache_get('api.darksky.forecast')) {
            if (!$forecast = file_get_contents("https://api.darksky.net/forecast/$apikey/$southport?exclude=minutely,alerts,flags&units=si")) {
                throw new Exception("Failed to get forecast from api", 60);
            }
            wp_cache_set('api.darksky.forecast', $forecast, '', 60);
        }

        if (!$forecast = json_decode($forecast)) {
            throw new Exception("Response not in JSON", 1);
        }

        $day = array_shift($forecast->daily->data);
        $daytime = $forecast->currently->time > $day->sunriseTime and $forecast->currently->time < $day->sunsetTime;
        $period = $daytime ? 'daytime' : 'night';

        $temperature = round($forecast->currently->temperature);
        $feels_like = round($forecast->currently->apparentTemperature);
        $icon = $forecast->currently->icon;

        $activities = get_field('activities', 'option') ?: [];
        foreach ($activities as $activity) {
           if (in_array($icon, $activity['condition']) and $temperature >= $activity['temperature']['from'] and $temperature <= $activity['temperature']['to'] and $activity['period'] == $period ) {
               return compact('activity', 'icon', 'feels_like', 'temperature', 'daytime');
           }
        }

        return compact('icon', 'feels_like', 'temperature', 'daytime');
    }

}
