<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $table = 'sessions';

    protected $guarded = ['id'];

    public function user()
    {
      return $this->hasMany('App\Models\User','id','userID');
    }
}
