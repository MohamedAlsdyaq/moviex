<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;

use App\Post as Post;
 
use Auth;
use App\User as User;
 
use Illuminate\Http\Request;
use App\Http\Requests;
 
use Illuminate\Support\Facades\DB;
class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function record($record, $query)
    {
        //if search exisits increase the weight 

       foreach ($record as $r) {
      
        $checker = SearchHistory::where('UserId', Auth::user()->id)
                            ->where('item_id', $r->id)
                            ->first();
                if($checker != null){
        $record = SearchHistory::where('UserId', Auth::user()->id)
                            ->where('item_id', $r->id)
                            ->increment('weight');
                        }
         //else
        else{
        $record = new SearchHistory;
        $record->UserId = Auth::user()->id;
        $record->item_id = $r->id;
        $record->SearchQuery = $query;
        $record->weight = 1;

        $record->save();
        }
         }
    }

  

    /**
     * Search a resource string if it contains any hashtags.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Array of strings 
     */
    public static function SearchString($string, $target)
    {
                    //

        /* Match hashtags */
        preg_match_all('/'.$target.'(\w+)/', $string, $matches);

        /* Add all matches to array */
        foreach ($matches[1] as $match) {
        $keywords[] = $match;
        }

        if(!isset($keywords))
        return null;

        return (array) $keywords;

    }
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
