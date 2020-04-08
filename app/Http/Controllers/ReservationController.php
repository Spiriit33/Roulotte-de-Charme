<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $configuration = Configuration::find(1);
        return view('admin.reservation.index', compact('configuration'));
    }

    public function show($id, Request $request)
    {
        if ($request->ajax()) {
            $reservation = Reservation::find($id)->get();
            return \response()->json($reservation);
        }
    }

    public function store(Request $request)

    {
        $date_debut = $request->input('date_debut');
        $date_fin = $request->input('date_fin');
        $nom = isset($request->nom) ? $request->input('nom') : null;
        $prenom = isset($request->prenom) ? $request->input('prenom') : null;
        $email = isset($request->email) ? $request->input('email') : null;
        $commentaire = isset($request->commentaire) ? $request->input('commentaire') : null;
        $nbPersonnes = $request->input('nb_personnes');

        $validator = $request->validate(['date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'nom' => 'nullable|string|max:255',
            'prenom' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'commentaire' => 'nullable',
            'nombre_personnes' => 'required|integer|max:2|min:1',]);
        $reservation = Reservation::create(['date_debut' => $date_debut,
            'date_fin' => $date_fin,
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'commentaire' => $commentaire,
            'nombre_personnes' => $nbPersonnes,]);
        return redirect()->route('manage_reservations')->with('succcess', 'Réservation crée avec succées!');

    }
    public function update(Request $request)

    {

        $where = array('id' => $request->id);

        $updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];

        $event  = Event::where($where)->update($updateArr);



        return Response::json($event);

    }
    public function destroy(Request $request)

    {

        Reservation::where('id',$request->route('id'))->delete();
        return redirect()->route('manage_reservations')->with('success','Reservation supprimé avec succés!');


    }


}
