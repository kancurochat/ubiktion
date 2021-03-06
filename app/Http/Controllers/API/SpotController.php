<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Spot as SpotResource;
use App\Models\Spot;
use Illuminate\Http\Request;

class SpotController extends Controller
{
    public function getSpots() {
        $spots = Spot::all();
        return response(['spots' => SpotResource::collection($spots)], 200);
    }
}
