<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use SoftDeletes;
    use Translatable;

    public $translatedAttributes = ['site_name', 'keywords', 'description', 'footer_desc'];

    // protected $guarded =['id','created_at','updated_at','deleted_at'];
    protected $fillable  = [ 'image', 'default_lang', 'link', 'created_by', 'updated_by', 'deleted_by'];
    protected $dates = ['deleted_at'];


    public function getImagePathAttribute()
    {
        return $this->image ? asset('uploads/' . $this->table . '/' . $this->image) : null;
    }

    public function getImageThumbPathAttribute()
    {
        return $this->image ? asset('uploads/' . $this->table . '/thumbs/' . $this->image) : null;
    }
    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function updatedBy()
    {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }

    public function deletedBy()
    {
        return $this->hasOne(User::class, 'id', 'deleted_by');
    }
}
