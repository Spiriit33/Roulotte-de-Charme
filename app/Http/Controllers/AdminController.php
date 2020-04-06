<?php

namespace App\Http\Controllers;

use App\Activite;
use App\Configuration;
use App\Contact;
use App\Http\Requests\RequestLogin;
use App\Reservation;
use App\SiteTouristique;
use App\SliderHome;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index ()
    {
        $configuration=Configuration::find(1);
        if (Auth::check()) {
            $bookings = Reservation::count();
            $activities = Activite::count();
            $sites = SiteTouristique::count();
            $contacts = Contact::count();
            return view('admin.index',compact('configuration','bookings','activities','sites','contacts'));
                 }
        else
            return view('admin.login',compact('configuration'));
    }
    public function postLogin (RequestLogin $request)
    {
        $data = $request->validated();
        $username = $data['username'];
        $password = $data['password'];
        $user = User::where('username', $username)->first();
        if (Hash::check($password, $user->password)) {
            Auth::login($user);
            return redirect()->back();
        } else
            return redirect()->back()->with('error', 'Password incorrect!');
    }
    public function getConfig () {
        $configuration=Configuration::find(1);
        $images = SliderHome::get();
        return view('admin.configuration',compact('configuration','images'));
    }
    public function postConfig () {

    }
}
