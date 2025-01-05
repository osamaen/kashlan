<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;


class ProductCategory extends AppModel
{
    use HasFactory;


    use  Translatable;
    public $translatedAttributes = ['title','short_description','description'];

    protected $fillable  =['parent_id', 'status',
    'item_order','image','created_by','updated_by'
    ,'deleted_by' ];


    public function sub_cats()
    {
        return $this->hasMany(ProductCategory::class,'parent_id')->orderByRaw('-item_order DESC');
    }


    public function parent(){
        return $this->belongsTo(ProductCategory::class,'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'category_id');
    }


}
