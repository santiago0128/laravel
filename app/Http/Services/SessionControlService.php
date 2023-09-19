<?php

namespace App\Http\Services;

use App\Models\User;

class SessionControlService
{
    public static function getSession(){

        $user = User::where('activo', true)->get();
        return $user;
    }

  
}
