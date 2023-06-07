<?php

namespace App\Services;
use Exception;
use GuzzleHttp\Client;

class GoogleMapservice {

    private $baseUrl;
    private $apiKey;

    public function __construct()
    {
        //$this->baseUrl = 'https://maps.googleapis.com/maps/api/geocode/json';
        $this->baseUrl = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json';
        $this->apiKey = env('GOOGLE_MAP_API_KEY');
    }

    public function findNearByPlaces($lat, $long, $radius)
    {
        $client = new Client();

        try{
            
            $response = $client->request('GET', $this->baseUrl, [
                'query' => [
                    'latlng' => $lat . ',' . $long,
                    'radius' => $radius * 1000, //km to meters
                    'key' => $this->apiKey,
                ],
            ]);

            if($response->getStatusCode() != 200) {
                return $this->throwError('Server did not return a 200 status code!');
            }
    
            $data = json_decode($response->getBody(), true);

            return $data;
        }

        catch(Exception $e) {
            return $this->throwError($e->getMessage());
        }
    }

    private function throwError($message)
    {
        throw new Exception($message);
    }
}