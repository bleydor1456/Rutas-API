<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DamageLevelIndexRequest;
use App\Http\Requests\DamageLevelStoreRequest;
use App\Models\DamageLevel;

class DamageLevelController extends Controller
{
    public function index(DamageLevelIndexRequest $request) {
        try {
            //Query all dame levels
            $damage_levels = DamageLevel::get();

            //return json response
            return response()->json($damage_levels);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function store(DamageLevelStoreRequest $request) {
        try {
            $damage_level = DamageLevel::create(
            [
                'name' => $request->name, 
                'level' => $request->level
            ]);

            return response()->json($damage_level);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
