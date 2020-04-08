<?php

namespace App;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class SiteTouristique extends Model
{
    use Cachable;
    protected $fillable = ['description','image'];
}
