<?php

namespace App\Http\Controllers;

use App\Models\RegisterModel;
use App\Models\TourModel;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function getRegister()
    {
        $locations = RegisterModel::all();
        return response()->json(['locations' => $locations]);
    }

    public function update(Request $request, $id)
    {
        $tour = TourModel::find($id);
        $register = RegisterModel::query()->create($request->all());
        return response()->json(['tour' => $tour, 'register' => $register]);
    }
}
