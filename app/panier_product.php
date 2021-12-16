<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class panier_product extends Model
{
    protected $fillable=['idproduct','idpanier','nombre'];
    public $timestamps=false;
}
