<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;

class Image extends AppModel
{
    use Translatable;
    protected $fillable = ['image',  'created_by', 'updated_by', 'deleted_by'];
    public $translatedAttributes = ['title', 'short_description'];

   
}
