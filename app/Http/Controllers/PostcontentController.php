<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Auth;
use Intervention\Image\Facades\Image as Image;
use App\Postcontent;
use Illuminate\Http\Request;

class PostcontentController extends Controller
{
  
    public static function create($request, $post_id)
    {
        File::makeDirectory(public_path('posts/'.$post_id),0777,true);
        for($i=0; $i<count($request); $i++){

            $media = $request[$i];
            $path = '/posts/'.$post_id;
            $filename = $i.'.jpg';

            //$location = public_path('posts'. DIRECTORY_SEPARATOR, $filename);
           // $media->storeAs($path, $filename);
            Image::make($media)->resize(300, null, function ($constraint) {
    $constraint->aspectRatio();
})->save(public_path($path. '/' . $filename));
            $content = new Postcontent;
            $content->post_id = $post_id;
            $content->user_id = Auth::user()->id;
            $content->content = '/posts/' . $post_id . '/' . $filename;
            $content->save();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Postcontent  $postcontent
     * @return \Illuminate\Http\Response
     */
    public function show(Postcontent $postcontent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Postcontent  $postcontent
     * @return \Illuminate\Http\Response
     */
    public function edit(Postcontent $postcontent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Postcontent  $postcontent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postcontent $postcontent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Postcontent  $postcontent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postcontent $postcontent)
    {
        //
    }
}
