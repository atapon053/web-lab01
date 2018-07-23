<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use CrudTrait;

    protected $fillable = [
      'profile_id',
      'title',
      'description'
    ];

}
