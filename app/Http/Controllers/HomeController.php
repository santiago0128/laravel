<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Services\CampainServices;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $campain = CampainServices::getCampainsUser();
        $user_session = DB::table('users')->where('activo', true)->paginate(10);

        return view('home', [
            'campains' => $campain,
            'user_session' => $user_session,
        ]);
    }

    public function main(){

        dd(request()['id']);

    }

}
