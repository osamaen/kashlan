<?php

namespace App\Models;



use Astrotomic\Translatable\Translatable;

class Product extends AppModel
{
    use Translatable;
    protected $fillable = ['is_new','image', 'price', 'category_id','brand_id', 'created_by', 'updated_by', 'deleted_by'];
    public $translatedAttributes = ['title', 'short_description', 'description', 'company', 'measure'];

    protected $appends = ['price_currency', 'currency'];

    public function getPriceCurrencyAttribute()
    {
        return number_format($this->price, 0) . ' ' . trans('frontend.lira_sy');
    }

    public function getCurrencyAttribute()
    {
        return trans('frontend.currency');
    }

    public function imageable()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class,'category_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
