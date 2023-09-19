<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Services\CampainServices;
use App\Http\Services\SessionControlService;

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
        $campain = CampainServices::getCampains();
        $user_session = SessionControlService::getSession();

        return view('home')->with('campains', $campain)
                           ->with('user_session', $user_session);
    }
}
