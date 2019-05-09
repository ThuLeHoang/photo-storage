<?php

namespace Retro\Http\Controllers;

use Illuminate\Http\Request;
use Retro\Image;
use DB;
use Illuminate\Support\Facades\Storage;

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
        $Images = DB::table('images')->where('user_id', $user_id)->orderBy('created_at', 'DESC');
        $Images = $Images->get();

        return view('home', ['Images' => $Images]);
    }


}
