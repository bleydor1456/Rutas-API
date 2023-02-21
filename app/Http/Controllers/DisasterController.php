<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DisasterStoreRequest;
use App\Models\Disaster;
use App\Models\DisasterServiceDamageLevel;

use Illuminate\Support\Facades\DB;

use Exception;

class DisasterController extends Controller
{
    public function show(Request $request, $disaster) {
        try {
            $disaster = Disaster::selectRaw("*, ST_AsText(location) as lstring")->where('id', $disaster)
                ->with('damage_level', 'disaster_type')
                ->first();

            //$disaster->load('damage_level', 'disaster_type_all_fields');
            
            return response()->json($disaster);
        } catch(Exception $e) {

        }
    }

    public function store(DisasterStoreRequest $request) {
        try {
            $latitude = $request->latitude;
            $longitude = $request->longitude;
            $request->merge(['location' => DB::raw("St_GeomFromText('Point($longitude $latitude)')")]);

            $disaster = Disaster::create($request->all());

            foreach($request->input('disaster_services', []) as $disaster_service) {
                $disaster->disasterServices()->create($disaster_service);
            }

            return response()->json($disaster);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
