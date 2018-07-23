<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use Translatable;
    public $translationModel = 'App\Models\CountryTranslation';

    public $translatedAttributes = ['name'];
    protected $fillable = ['code'];
}