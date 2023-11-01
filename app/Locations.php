<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    protected $fillable=[
   	'area_name',
   	'area_code',
   	'latitude',
   	'longitude'
   ];
}
