<?php

namespace Retro\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\UploadedFile;
use Retro\Image;
class UploadController extends Controller
{
    public function index(){
    	return view('upload');
    	
    }

    public function upload(Request $request){
		// $id = \Auth::user()->id;
		foreach($request->file('image') as $key => $file)
		{
			$name=$file->getClientOriginalName();
			// $image_encod = base64_encode(file_get_contents($request->file('image')[$key]));
			$destinationPath = public_path('/images');
			$file->move($destinationPath, $name);

			$image = new Image();
			$image->image = $name;
			$image->created_at=Input::get(now());
			$image->updated_at=Input::get(now());
			// $image->user_id = $id;
			$image->save();

		}
		return redirect('/home');
		// return response()->json(['uploaded'=>'/upload'.$name]);

		// $files = $request->file('file');
     	// if (Input::hasFile('image')) {
		// 	$file = Input::file('image');
		// 	$file->move(public_path("images").'/', $file->getClientOriginalName());
		// 	foreach($files as $file){
				
				
				 
		// 		 $image[]->image = $file->getClientOriginalName();
		// 		 $image[]->created_at=Input::get(now());
		// 		$image[]->updated_at=Input::get(now());
		// 		$image[]->user_id = $id;
		// 	}
     		
     	// }
		// // $file->save();
     	// echo "done";
     	
    }
}
