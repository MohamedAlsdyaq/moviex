<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        $groups = GroupentriesController::getGroups(Auth::user()->id);
        $lists = LaistController::GetListForUser(Auth::user()->id);
    
        $tvs = LibraryController::CurrentTv();
        return view('welcome')->with(
            [
                'tvs' => $tvs,
                'groups' => $groups,
                'lists' => $lists
    ]);
    }

      public static function explore()
    {
     
    }
}
