<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sous_categorie extends Model
{    
    protected $fillable=['nom','idcat'];
    public $timestamps=false;
}
