<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function index()
    {
        $houses = House::all();
        return response()->json([
            'success' => true,
            'results' => $houses
        ]);
    }

    // con id
    public function show($id)
    {
        $house = House::find($id);
        $house_arr = [
            "house" => $house,
            "user" => $house->user
        ];

        if (!$house) {
            return response()->json([
                'success' => false,
                'results' => 'Casa non trovata'
            ], 404);
        }
        return response()->json([
            'success' => true,
            'results' => $house_arr
        ]);
    }

    // quelle in evidenza
    public function evidenza()
    {
        $houses = House::where('inEvidenza', 1)->get();
        return response()->json([
            'success' => true,
            'results' => $houses
        ]);
    }
}
