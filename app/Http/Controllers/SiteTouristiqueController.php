<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Http\Requests\RequestSiteTouristique;
use App\Http\Requests\RequestUpdateSiteTouristique;
use App\SiteTouristique;
use Illuminate\Http\Request;

class SiteTouristiqueController extends Controller
{
    public function manage () {
        $configuration=Configuration::find(1);
        $sites=SiteTouristique::OrderBy('created_at','DESC')->get();
        return view('admin.sites.index',compact('configuration','sites'));
    }
    public function store (RequestSiteTouristique $request) {
        $data=$request->validated();

        $image=new SiteTouristique();
        $image->hash=$data['image']->store('uploads','public');
        $image->description=$data['description'];
        $image->save();

        return redirect()->back()->with('success','Crée avec succés!');
    }
    public function edit ($id) {
        $site=SiteTouristique::find($id);
        return view('admin.sites.edit',compact('site'));
    }
    public function update (RequestUpdateSiteTouristique $request,$id) {
        $data=$request->validated();
        $desc=isset($data['description']) ? $data['description'] : null;
        $image=isset($data['image']) ? $data['image'] : null;
        $site =SiteTouristique::find($id);
        if ($image) {
            $site->update(['hash'=>$image->store('uploads','public')]);
        }
        $site->update(['description'=>$desc]);
        return redirect()->back()->with('success','Mis à jour avec succés');
    }
    public function delete ($id) {
        SiteTouristique::find($id)->delete();
        return redirect()->back()->with('success','Supprimé avec succés');
    }
}
