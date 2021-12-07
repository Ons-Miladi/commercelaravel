<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class caract extends Model
{
  protected $fillable=['taille','couleur','quantite','idproduct'];
  public $timestamps=false;
}
