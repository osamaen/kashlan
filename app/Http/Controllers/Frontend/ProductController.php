<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Menu;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use Illuminate\Http\Request;

class ProductController extends FrontEndController
{
    /**
     * Display a listing of the resource.
     */

     public function __construct(Product $model)
     {
         parent::__construct($model);

         $bunner_photo = Menu::findOrFail(3)->image_path;
         view()->share([
            //  'pre_title' => Menu::where('name', 'products')->first()->heading,
            //  'page_title' => Menu::where('name', 'products')->first()->title,
             'categories' =>  ProductCategory::active()->orderByRaw('-item_order DESC')->orderBy('id', 'DESC')->get(),
             'bunner_photo' => $bunner_photo,
        
        
            ]);
     }


     public function index(Request $request)
     {
 
         $items = $this->model->active()->orderByRaw('-item_order DESC')->orderBy('id', 'DESC')->take(9)->get();
         $main_cat_id = $request->main_cat;
         
         if (isset($request->category_id)) {
             $items = $this->model->active()->orderByRaw('-item_order DESC')
                 ->orderBy('id', 'DESC')
                 ->where('category_id', $request->category_id)
                 ->get();
         }
         
 
 
         return view($this->frontend_pages_folder . '.products', compact('items'));
     }
 
 
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = $this->model->findOrFail($id);
        $other_products = Product::where('category_id', $item->category_id)->where('id', '!=', $item->id)->get();
        return view($this->frontend_pages_folder . '.product-details', compact(['item', 'other_products']));
    }
  
}
