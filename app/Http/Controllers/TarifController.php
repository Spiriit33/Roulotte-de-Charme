<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Http\Requests\RequestReservation;
use App\Notifications\ReservationNotification;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TarifController extends Controller
{
    public function index () {
        $configuration=Configuration::find(1);
        return view('tarifs',compact('configuration'));
    }
    public function store (RequestReservation $request) {
        $data=$request->validated();
        $query=DB::table('reservations')
            ->whereBetween('date_debut',[$data['date_debut'],$data['date_fin']])
            ->orwhereBetween('date_fin',[$data['date_debut'],$data['date_fin']])
            ->orWhere('date_debut','=',$data['date_debut'])
            ->orWhere('date_fin','=',$data['date_fin'])
            ->get();
        if ($query->count() == 0) {
            $reserv = new Reservation();
            $reserv->nom = $data['nom'];
            $reserv->email = $data['email'];
            $reserv->commentaire = $data['commentaire'];
            $reserv->nombre_personnes = $data['nombre_personnes'];
            $reserv->date_debut = $data['date_debut'];
            $reserv->date_fin = $data['date_fin'];
            $reserv->save();
            $config=Configuration::find(1);
            $config->notify(new ReservationNotification($reserv));

            return redirect()->back()->with('success','Réservation effectué avec succés!');
        }
        else
            return redirect()->back()->with('error','Periode non disponible.');
    }
    public function getReservations () {
        $query=Reservation::get();
        foreach($query as $row)
        {
            $date = new Carbon($row->date_fin);
            $data[] = array(
                'id' => $row->id,
                'name'=>$row->nom,
                'title'=>$row->title,
                'start'   => $row->date_debut,
                'end'   => $date->addDay(),
            );
        }
        echo json_encode($data);
    }
}
