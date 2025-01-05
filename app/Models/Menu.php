<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;

class Menu extends AppModel
{

    use Translatable;
    protected $fillable = ['name','in_nav','image', 'created_by',
        'updated_by', 'deleted_by'];

    public $translatedAttributes = ['title','heading','short_description','description'];
}
