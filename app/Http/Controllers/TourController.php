<?php

namespace App\Http\Controllers;

use App\Models\LocationModel;
use App\Models\StatusModel;
use App\Models\TourModel;
use Illuminate\Http\Request;

class TourController extends Controller
{

    public function getTour()
    {
        $tour = TourModel::all();
        return response()->json(['tour' => $tour]);
    }
    public function getStatus()
    {
        $status = StatusModel::all();
        return response()->json(['status' => $status]);
    }

    public function create(Request $request)
    {
        $tour = new TourModel();
        $tour->tour_name = $request->input('tour_name');
        $tour->status = $request->input('status');
        $tour->pay_date = $request->input('pay_date');
        $tour->start_round = $request->input('start_round');
        $tour->end_round = $request->input('end_round');
        $tour->tour_price = $request->input('tour_price');
        $tour->num_people = $request->input('num_people');
        $tour->country = $request->input('country');
        $tour->city = $request->input('city');
        $tour->note = $request->input('note');

        $tour->save();
        return response()->json(['tour' => $tour]);
    }
}
