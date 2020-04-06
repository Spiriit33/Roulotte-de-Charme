<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{
    public function status () {
        return $this->hasOne(ContactStatut::class,'contact_id');
    }
    public function messages () {
        return $this->hasMany(ContactMessage::class,'contact_id');
    }
    public static function awaitingAnswer () {
        return DB::table('contacts')
            ->join('contact_statuts','contact_id','=','contacts.id')
            ->where('status','=',1)
            ->count();
    }
}
