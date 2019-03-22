<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    protected $fillable=[
      'name',
      'date_of_birth',
      'gender',
      'address',
      'phone',
      'login_id',
      'picture'
    ];
}
