<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;

class Contact extends AppModel
{
    use Translatable;
    
    public $translatedAttributes = ['title', 'address', 'address2', 'opening'];

    protected $fillable  = ['fax', 'phone', 'mobile', 'email', 'map', 'created_by', 'updated_by', 'deleted_by'];
}
