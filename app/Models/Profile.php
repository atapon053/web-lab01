<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
   use CrudTrait;

   protected $fillable = [
       'user_id',
       'name',
       'birthday',
       'age',
       'address',
       'special_interest'
   ];
}
