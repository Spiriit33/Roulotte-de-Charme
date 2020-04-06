<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Http\Requests\RequestConfig;
use App\SliderHome;
use Illuminate\Http\Request;
use app\Activite;
use Illuminate\Support\Facades\DB;

class ConfigurationController extends Controller
{
    public function store (RequestConfig $request)
    {
        $data = $request->validated();
        $titre = isset($data['titre']) ? $data['titre'] : null;
        $email = isset($data['email']) ? $data['email'] : null;
        $telephone = isset($data['telephone']) ? $data['telephone'] : null;
        $logo = isset($data['logo']) ? $data['logo']->store('uploads', 'public') : null;
        $acceuil = isset($data['message_acceuil']) ? $data['message_acceuil'] : null;
        $actu = isset($data['afficher_actu']) ? $data['afficher_actu'] : 0;
        $images = isset($data['images']) ? $data['images'] : null;
        $conf = Configuration::find(1);
        $updateLogo = $logo!=null ? $logo : $conf->logo;
        if (!isset($conf)) {
            Configuration::create([
                'title' => $titre,
                'logo' => $logo,
                'msg_home' => $acceuil,
                'display_news' => $actu,
                'email' => $email,
                'telephone' => $telephone,
            ]);
        }
        if (isset($conf)) {
            $conf->update(['title'=>$titre,'telephone'=>$telephone,'email'=>$email,'msg_home'=>$acceuil,'display_news'=>$actu,'logo'=>$updateLogo]);
        }
            if ($images) {
                DB::table('slider_homes')->delete();
                foreach ($images as $image) {
                    $slider = new SliderHome();
                    $slider->hash = $image->store('uploads', 'public');
                    $slider->save();
                }
            }
            return redirect()->back()->with('success', 'Mis à jour avec succés!');
        }
    }
