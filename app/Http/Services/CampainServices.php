<?php

namespace App\Http\Services;

use App\Models\Campains;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CampainServices
{
    public static function getCampainsUser(){
        $idcampanas = Auth::User()->campanas;
        $campanas = Campains::wherein('id', explode(",",$idcampanas))->get();
        return $campanas;
    }
}
