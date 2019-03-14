<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\UploadedFile;
use App\Image;
class UploadController extends Controller
{
    public function index(){
    	return view('upload');
    	
    }

    public function upload(Request $request){
        $image = new Image();
        // $id = \Auth::user()->id;
        
     	if (Input::hasFile('image')) {
     		$file = Input::file('image');
     		$file->move(public_path("images").'/', $file->getClientOriginalName());
     		$image->image = $file->getClientOriginalName();
     		$image->created_at=Input::get(now());
        	$image->updated_at=Input::get(now());
        	// $image->user_id = $id->getClientOriginalName());

     	}
$image->save();
     	echo "done";
     	
    }
}
