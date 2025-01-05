<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
class Brand extends AppModel
{
    use HasFactory;
    use  Translatable;
    public $translatedAttributes = ['title','short_description','description'];

    protected $fillable  =[ 'image','created_by','updated_by','deleted_by' ];

    public function categories()
    {
        return $this->hasManyThrough(
            ProductCategory::class,   // نموذج الفئة
            Product::class,    // نموذج المنتج
            'brand_id',        // المفتاح الخارجي في جدول المنتجات الذي يشير إلى الماركة
            'id',              // المفتاح الخارجي في جدول الفئات الذي يشير إلى الفئة
            'id',              // المفتاح المحلي في جدول الماركات
            'category_id'      // المفتاح المحلي في جدول المنتجات الذي يشير إلى الفئة
        )->distinct();         // يضمن جلب الفئات الفريدة فقط
    }

}
