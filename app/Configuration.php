<?php

namespace App;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Configuration extends Model
{
    use Notifiable;
    use Cachable;
    protected $fillable = ['title','logo','msg_home','display_news','email','telephone'];
}
