<?php

namespace App\Http\Controllers\API;

use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function provinces()
    {
        return Province::all();
    }

    public function regencies($id)
    {
        return Regency::where('province_id', $id)->get();
    }

    public function districts($id)
    {
        return District::where('regency_id', $id)->get();
    }
    
    public function villages($id)
    {
        return Village::where('district_id', $id)->get();
    }
}
