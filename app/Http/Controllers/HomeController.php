<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

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
        $nombre = Auth::user()->name;
        return view('home')->with('nombre', $nombre);
    }

    public function test()
    {
        $nombre = Auth::user()->name;
        return view('test')->with('nombre', $nombre);
    }


}
