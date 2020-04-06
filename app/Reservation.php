<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['date_debut','date_fin','nom','commentaire','nombre_personnes','email'];
    public function isBooket ($start_date,$end_date) {
        $query=$this->where('date_debut','=',$start_date);
        if (!$query) {
            $this->where('date_fin','=',$end_date);
        }
    }
}

