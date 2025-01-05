<?php

namespace App\Models;


use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends AppModel
{

    use SoftDeletes;
    protected $fillable = ['image1','image2','image3','image4','image5', 'created_by', 'updated_by', 'deleted_by'];
 
    public function getImagePathAttribute()
    {
        return $this->image ? asset('uploads/' . $this->table . '/' . $this->image) : null;
    }
}
