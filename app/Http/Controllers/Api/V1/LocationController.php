<?php

namespace App\Http\Controllers\Api\V1;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\GoogleMapservice;

class LocationController extends Controller
{
    public function nearbyPlaces(Request $request)
    {
        $request->validate([
            'lat' => 'required',
            'long' => 'required',
        ]);

        $radius = 5;
        $map = new GoogleMapservice();
        $places = $map->findNearByPlaces($request->lat, $request->long, $radius);

        return $this->successResponse(200, 'Nearby places', $places);
    }
}
