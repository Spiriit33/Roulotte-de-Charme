<?php

namespace App\Http\Controllers;

use App\Activite;
use App\Configuration;
use App\Http\Requests\RRequestCreateActivity;
use App\SiteTouristique;
use App\SliderHome;
use Illuminate\Http\Request;

class ActiviteController extends Controller
{
    public function index () {
        $activites=Activite::get();
        $sliders=SiteTouristique::get();
        $configuration=Configuration::find(1);

        return view('activites',compact('activites','sliders','configuration'));
    }
    public function manage () {
        $activites=Activite::get();
        $configuration=Configuration::find(1);
        return view('admin.activites.index',compact('activites','configuration'));
    }
    public function store (RRequestCreateActivity $request) {
        $data=$request->validated();
        Activite::create([
            'title'=>$data['titre'],
            'description'=>$data['description'],
        ]);
        return redirect()->back()->with('success','Activité crée avec succés!');

    }
    public function edit ($id) {
        $activite=Activite::find($id);
        $configuration=Configuration::find(1);
        return view('admin.activites.edit',compact('activite','configuration'));
    }
    public function update ($id,RRequestCreateActivity $request) {
        $data=$request->validated();
        Activite::find($id)->update(['title'=>$data['titre'],'description'=>$data['description']]);
        return redirect()->back()->with('success','Activité mise à jour avec succés!');
        }
}
