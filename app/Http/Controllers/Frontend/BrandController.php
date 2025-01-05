<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Models\Brand;
use App\Models\Menu;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;

class BrandController extends FrontEndController
{
    /**
     * Display a listing of the resource.
     */

     public function __construct(Brand $model)
     {
         parent::__construct($model);
         view()->share([
             'brands' =>  Brand::active()->orderByRaw('-item_order DESC')->orderBy('id', 'DESC')->get()
         ]);
     }
    public function index()
    {
        return view('frontend.pages.brands');
    }


 
    public function show($id)
    {
        $item = $this->model->findOrFail($id);
        $page_title = Menu::where('id', 6)->first()->title;
        return view($this->frontend_pages_folder . '.details', compact(['item', 'page_title']));
    }
 
}
