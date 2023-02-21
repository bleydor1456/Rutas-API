<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DisasterType;
use App\Http\Requests\DisasterTypeStoreRequest;

class DisasterTypeController extends Controller
{
    public function index() {
        try {
            //Query all dame levels
            $disaster_type = DisasterType::get();

            //return json response
            return response()->json($disaster_type);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function store(DisasterTypeStoreRequest $request) {
        try {
            $data = $request->all();

            //Query all dame levels
            $disaster_type = DisasterType::create($data);

            //return json response
            return response()->json($disaster_type);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
