<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Models\ProductCategory;
use App\Models\Menu;
use App\Models\Product;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use Illuminate\Http\Request;
class ProductCategoryController extends FrontEndController
{    
    
    public function __construct(ProductCategory $model)
    {
        parent::__construct($model);

        view()->share([
   
            'main_products_cats' => ProductCategory::where('parent_id', null)->get()
        ]);

  
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
  

     public function show(Request $request, $id)
     {
         $item = $this->model->findOrFail($id);
    
        $products = Product::active()->orderByRaw('-item_order DESC')
        ->orderBy('id', 'DESC')->whereIn('category_id',$item->sub_cats->
        pluck('id')->toArray())->get();


        if (isset($request->category_id)) {
            $products = Product::active()->orderByRaw('-item_order DESC')
                ->orderBy('id', 'DESC')
                ->where('category_id', $request->category_id)
                ->get();
        }
         $page_title = Menu::where('id', 6)->first()->title;
         return view($this->frontend_pages_folder . '.category-details', compact(['item', 'page_title','products']));
     }
  
  
}
