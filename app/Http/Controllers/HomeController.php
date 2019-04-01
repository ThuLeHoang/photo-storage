<?php

namespace Retro\Http\Controllers;

use Illuminate\Http\Request;
use Retro\Image;

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
        $user_id = \Auth::user()->id;
        $Images = Image::all()->where('user_id', $user_id);
        // $Images = ""

        return view('home', ['Images' => $Images]);
    }


}
