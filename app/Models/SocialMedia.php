<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends AppModel
{
    use Translatable;
    public $translatedAttributes = ['title'];

    protected $fillable  =[ 'link','type','created_by','updated_by','deleted_by' ];
}
