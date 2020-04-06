<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Contact;
use App\Http\Requests\RequestReservation;
use App\Mail\AnswerMail;
use App\Notifications\NotificationContact;
use App\Notifications\NotifificationReservation;
use App\Notifications\ReservationNotification;
use App\Reservation;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TarifController extends Controller
{
    public function index () {
        $configuration=Configuration::find(1);
        return view('tarifs',compact('configuration'));
    }
    public function store (RequestReservation $request) {
        $data=$request->validated();
        $query=DB::table('reservations')
            ->wheredate('date_debut','>=',$data['date_debut'])
            ->wheredate('date_fin','<=',$data['date_fin'])
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
            $data[] = array(
                'id' => $row->id,
                'name'=>$row->nom,
                'title'=>$row->title,
                'start'   => $row->date_debut,
                'end'   => $row->date_fin,
            );
        }
        echo json_encode($data);
    }
}
