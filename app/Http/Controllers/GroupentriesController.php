<?php

namespace App\Http\Controllers;

use App\Groupentries;
use Illuminate\Http\Request;
use Auth;
class GroupentriesController extends Controller
{
            public static function GroupCount($id)
    {
        return Groupentries::where('user_id', Auth::user()->id)
        ->count();
    }
}
