<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priorities extends Model
{
     protected $fillable=[
   	'priority_name',
   	'priority_code'
   ];
}
