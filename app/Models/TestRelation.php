<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TestRelation extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
      'user_id',
      'name'
    ];

//    user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
