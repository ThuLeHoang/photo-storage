<?php

namespace Retro\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\UploadedFile;
use Retro\Image;
use Retro\Album;
use Illuminate\Support\Facades\Storage;
use DB;
class UploadController extends Controller
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
    public function index(){
        $user_id = \Auth::user()->id;
        $Albums = DB::table('albums')->where('user_id', $user_id)->orderBy('created_at', 'DESC');
        $Albums = $Albums->get();
        return view('upload', ['Albums' => $Albums]);    	
    }

    public function upload(Request $request){
		$id = \Auth::user()->id;
        $album_id = $request->input('album_id');
        $public = Input::has('public') ? true : false;
		foreach($request->file('image') as $key => $file)
		{
			$name=$file->getClientOriginalName();
			$destinationPath = public_path('/images');
			$file->move($destinationPath, $name);
			$image = new Image();
			$image->image = $name;
			$image->user_id = $id;
      $image->album_id = $album_id;
      $image->public = $public;
			$image->save();
		}   
        return redirect('/home');	
    }

    public function destroy($id){
        $image = Image::find($id);
        Storage::delete($image->path);
        $image->delete();
        return redirect('/home');
    }

    public function edit($id){
        $image = Image::find($id);
    }

    public function update(Request $request){
        $image = Image::find($id);
        $image = update($request->all());
        $image->title = $request->input('title');
        $image->description = $request->input('description');
        $image->save();
        return redirect('/home')->with('image', $image);
    }
}
