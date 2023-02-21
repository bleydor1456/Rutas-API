<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublicService;

class PublicServiceController extends Controller
{
    public function index() {
        try {
            //Query all dame levels
            $public_service = PublicService::get();

            //return json response
            return response()->json($public_service);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
