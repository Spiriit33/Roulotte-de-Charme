<?php

namespace App;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    use Cachable;
    protected $fillable = ['title','description'];
}
