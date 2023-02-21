<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Exception;

class CityController extends Controller
{
    public function index() {
        try {
            //Query all cities
            $cities = City::get();

            //return json response
            return response()->json($cities);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
