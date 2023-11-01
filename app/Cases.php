<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
     protected $fillable=[
   	'location_id',
   	'category_id',
   	'nationality_id',
   	'case_id',
   	'date',
   	'time',
   	'gender',
   	'age',
   	'description',
      'latitude',
      'longitude',
      'is_archive'
   ];
}
