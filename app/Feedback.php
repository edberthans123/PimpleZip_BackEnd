<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
      'user_id',
      'consultant_id',
      'message',
      'rating'
    ];
}
