<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Brand;
use Illuminate\Support\Facades\Mail;


class HomeController extends AdminController
{

    public function __construct()
    {
        app()->setLocale('ar');
        $this->middleware('auth:admin');
        // $menus = Menu::orderByRaw('-item_order DESC')->get();
        view()->share([
            'module_name' => 'home',
            'module_title' => trans('admin.admin_title'),
            'method_name' => 'index',
            'method_title' =>  trans('home.statistics'),
            // 'menus' =>  $menus,
        ]);
    }

    public function index()
    {
        return view('admin.pages.home');
     
    }
}

