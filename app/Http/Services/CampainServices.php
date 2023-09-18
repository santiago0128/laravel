<?php

namespace App\Http\Services;

use App\Models\Campains;

class CampainServices
{
    public static function getCampains(){
        return Campains::all();
    }
}
