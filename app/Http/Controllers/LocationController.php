<?php

namespace App\Http\Controllers;

use App\Models\LocationModel;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function getLocation()
    {
        $locations = LocationModel::all();
        return response()->json(['locations' => $locations]);
    }

    public function create(Request $request)
    {
        $location = LocationModel::query()->create($request->all());
        return response()->json(['location' => $location]);
    }
}
