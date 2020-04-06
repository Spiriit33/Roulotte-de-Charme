<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactStatut extends Model
{
    protected $primaryKey="contact_id";

    protected $fillable = ['contact_id','status'];
}
