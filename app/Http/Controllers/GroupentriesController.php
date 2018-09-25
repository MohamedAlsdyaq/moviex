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
   
   public function GroupUsers($id){

    return Groupentries::where('group_id', $id)
            ->with('user')
            ->get();

   }
        public function UserGroups(Request $query,  $sort='created_at', $type=['movies', 'tv']){
           
           if($query['type'])
            $type = [$query['type'] ];
          if(isset($query['sort']))
            $sort = $query['sort'];
$qr = $query['query'];
 
        return Groupentries::where('user_id', $query['id'])

                   ->with('group')
                    ->orderBy($sort, 'desc')
                    
                    ->paginate(2500 );

    }

    public function GetMyGroups(){

        return Groupentries::where('user_id', Auth::user()->id)

                    ->pluck('group_id')->toJson();
    }

    public static function getGroups( $id)
    {
        //
            return Groupentries::where('user_id', $id)
             ->orderBy('updated_at', 'desc')
             ->with('group')
             ->paginate(20);
    }
    public function join($id){

        $entry = new Groupentries;
        $entry->user_id = Auth::user()->id;
        $entry->group_id = $id;
        $entry->save();
    }

     public function leave($id){

        Groupentries::where('user_id', Auth::user()->id)->where('group_id', $id)->delete();
    }

         public function check($id){

  if( Groupentries::where('user_id', Auth::user()->id)->where('group_id', $id)->count() > 0)
          {  return 1; }

            return 0;
    }
}
