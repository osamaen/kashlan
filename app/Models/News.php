<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;

class News extends AppModel
{
    use Translatable;
    protected $fillable = ['image', 'at_home', 'created_by', 'updated_by', 'deleted_by'];
    public $translatedAttributes = ['title', 'short_description', 'description'];


}
