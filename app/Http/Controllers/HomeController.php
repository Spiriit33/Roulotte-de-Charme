<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\SliderHome;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders=SliderHome::orderBy('ID','DESC')->get();
        $configuration=Configuration::find(1);
        return view('home',compact('sliders','configuration'));
    }
    public function redirect () {
        return redirect()->home();
    }
}
