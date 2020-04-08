<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Http\Requests\RequestSiteTouristique;
use App\Http\Requests\RequestUpdateSiteTouristique;
use App\ImageRoulotte;

class RoulotteController extends Controller
{
    public function index () {
        $configuration=Configuration::find(1);
        $sliders=ImageRoulotte::get();
        return view('roulotte',compact('configuration','sliders'));
    }
    public function situer () {
        $configuration=Configuration::find(1);
        return view('location',compact('configuration'));
    }
    public function manage () {
        $images=ImageRoulotte::get();
        return view('admin.roulotte.index',compact('images'));
    }
    public function store (RequestSiteTouristique $request) {
        $data=$request->validated();

        $image=$data['image'];
        $desc=isset($data['description']) ? $data['description'] : null;

        $roulotte=new ImageRoulotte();
        $roulotte->hash=$data['image']->store('uploads','public');
        $roulotte->description=$desc;
        $roulotte->save();
        return redirect()->back()->with('success','Roulotte crée avec succés');
    }
    public function edit ($id) {
        $image = ImageRoulotte::find($id);
        return view('admin.roulotte.edit',compact('image'));
    }
    public function update ($id,RequestUpdateSiteTouristique $request)  {
        $data=$request->validated();
        $image = ImageRoulotte::find($id);
        $image=$data['image'];
        $desc=isset($data['description']) ? $data['description'] : null;
        if ($image) {
            $image->update(['hash'=>$image->store('uploads','public')]);
        }
        if ($desc) {
           $image->update(['description'=>$desc]);
        }
        return redirect()->back()->with('success','Mis à jour avec succés');
    }
    public function delete ($id) {
        $image=ImageRoulotte::find($id);
        $image->delete();
        return redirect()->back()->with('success','Supprimé avec succés');
    }
}
