<?php

namespace App\Http\Services;

use DateTime;
use App\Models\User;
use Ramsey\Uuid\Uuid as uuid;
use App\Models\SessionControl;
use Illuminate\Support\Facades\Auth;


class SessionControlService
{
    public static function InsertSession(){

        $uuid = uuid::uuid4(); 
        $uuidString = $uuid->toString();
        $token = password_hash($uuidString, PASSWORD_DEFAULT);
        $fecha = date('Y-m-d H:i:s');
        SessionControl::updateOrCreate(
            ['idusuario' => Auth::User()->id,], // Condiciones de búsqueda
            ['fecha' => $fecha, 'token' => $token, 'estado' => '1'] // Valores a actualizar o crear
        );
      
    }

    public static function getSessionUser(){
        $usuario_session = SessionControl::where('estado','1')
                           ->select('idusuario')
                           ->paginate(10);

        for ($i=0; $i <count($usuario_session) ; $i++) { 
            $usuario[] = User::where('id', $usuario_session[$i]->idusuario)->first();
        }   
        return $usuario;
    }
}
