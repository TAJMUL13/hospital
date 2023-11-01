<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable=[
   	'priority_id',
   	'priority_name',
   	'category_code',
   	'category_name'
   ];
}
