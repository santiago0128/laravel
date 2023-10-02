<?php

namespace App\Http\Controllers;

use App\Models\Campains;
use App\Models\User;

class UserController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = self::getAllUser();
        return view('user')->with('user', $user);
    }
    public function store($id)
    {
        $user = User::where('id', $id)->first();
        $campanas = Campains::All();
        return view('editusers')->with('user', $user)->with('campanas', $campanas);
    }

    public function getAllUser()
    {
        $user = User::All();
        return $user;
    }
    public function editarUsuarios()
    {
        $data = request();
        $user = User::where('id', $data->idusuario)->first();
        $campanas_activas = explode('|', $user->campanas);
        if(in_array($data->idcampana, $campanas_activas)){
            $indice = array_search($data->idcampana, $campanas_activas);
            unset($campanas_activas[$indice]);
        }else{
            $campanas_activas[] = $data->idcampana;
        }

        if (count($campanas_activas) >= 1) {
            $campanas = implode('|', $campanas_activas);
        }else{
            $campanas =  $campanas_activas;
        }
        User::where('id', $data->idusuario)->update(['campanas' => $campanas]);

    }

}
