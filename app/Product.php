<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $fillable=['image','name','price','souscatid'];
   public $timestamps=false;
}

