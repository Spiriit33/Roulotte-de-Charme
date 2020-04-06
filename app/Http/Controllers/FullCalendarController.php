<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;

class FullCalendarController extends Controller
{
    public function index () {
        if(request()->ajax())
        {

            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');

            $data = Reservation::whereDate('date_debut', '>=', $start)->whereDate('date_fin',   '<=', $end)->get(['id','date_debut', 'date_fin']);
            return Response::json($data);
        }
        return view('fullcalender');
    }
}
