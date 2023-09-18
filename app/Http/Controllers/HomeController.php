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
        $user_session = SessionControlService::getSessionUser();

        $perPage = 10;
        $page = request()->get('page', 1); // Obtén el número de página de la solicitud (predeterminado: 1)
        $offset = ($page - 1) * $perPage;
        $items = array_slice($user_session, $offset, $perPage);
        $paginator = new LengthAwarePaginator($items, count($user_session), $perPage, $page);

        return view('home')->with('campains', $campain)
                           ->with('user_session', $user_session);
    }
}
