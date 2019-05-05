<?php

namespace Retro\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Retro\Album;
use Retro\Image;

use DB;

class AlbumsController extends Controller
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
        
        $user_id = \Auth::user()->id;
        $Albums = DB::table('albums')->where('user_id', $user_id)->orderBy('created_at', 'DESC');
        $Albums = $Albums->get();

        return view('albums', ['Albums' => $Albums]);
    }

    public function create(Request $request){
        $request->validate([
            'title' => 'required|max:255'
        ]);

        $id = \Auth::user()->id;
        $album = new Album;
        $album->user_id = $id;
        $album->title = $request['title'];
        $album->description = $request['description'];
        $album->public = Input::has('public') ? true : false;
        $album->save();
        $album_id = $album->id;
        
        if ($request->file('image')) {
            foreach($request->file('image') as $key => $file)
            {
                $name=$file->getClientOriginalName();
                $destinationPath = public_path('/images');
                $file->move($destinationPath, $name);

                $image = new Image();
                $image->image = $name;
                $image->user_id = $id;
                $image->album_id = $album_id;
                $image->save();

            }
        }
        
        // return response()->json(['uploaded'=>'/upload'.$name]);
        return redirect('/albums');
    }
}
