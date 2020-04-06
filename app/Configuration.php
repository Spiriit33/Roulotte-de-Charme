<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Configuration extends Model
{
    use Notifiable;
    protected $fillable = ['title','logo','msg_home','display_news','email','telephone'];
}
