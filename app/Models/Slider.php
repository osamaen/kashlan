<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Slider extends AppModel
{
    use HasFactory;

    use  Translatable;
    public $translatedAttributes = ['title','short_description','description'];

    protected $fillable  =[ 'image','created_by','updated_by','deleted_by' ];

}
