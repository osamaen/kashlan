<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Models\News;
use App\Models\Menu;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;

class NewsController extends FrontEndController
{

     public function __construct(News $model)
     {
         parent::__construct($model);
         view()->share([
             'news' =>  News::active()->orderByRaw('-item_order DESC')->orderBy('id', 'DESC')->get()
         ]);
     }


    public function index()
    {
        return view('frontend.pages.news');
    }


    public function show($id)
    {
        $item = $this->model->findOrFail($id);
        $page_title = Menu::where('id', 6)->first()->title;
        return view($this->frontend_pages_folder . '.details', compact(['item', 'page_title']));
    }
 


}
