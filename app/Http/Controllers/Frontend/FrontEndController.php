<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\ProductCategory;
use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\News;
use App\Models\EngineeringCommunity;
use App\Models\EngSpecificationCat;
use App\Models\Menu;
use App\Models\Brand;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\SocialMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FrontEndController extends Controller
{
    protected $model;
    protected $controller_name;
    protected $module_name;
    protected $module_title;
    protected $method_name;
    protected $method_title;
    protected $frontend_folder = 'frontend';
    protected $frontend_pages_folder = 'frontend.pages';
    protected $frontend_includes_folder = 'frontend.includes';
    protected $frontend_components_folder = 'frontend.components';
    protected $method_view;
    protected $asset_version = 1.91;
    protected $uploads_folder;
    //  protected $index_route;


    public function __construct(Model $model = null)
    {
        $this->asset_version = time();
        $this->model = $model;
        $this->controller_name = $this->getControllerName();
        $this->module_name = Str::snake(Str::plural($this->controller_name));
        $this->method_name = request()->route()->getActionMethod();
        $this->method_view = $this->frontend_folder . '.' . $this->module_name . '.' . $this->method_name;

        $this->uploads_folder = 'uploads';
        $this->module_title = trans($this->module_name . '.module_title');
        $this->method_title = $this->method_name == 'index' ? trans($this->module_name . '.module_title') : trans('admin.' . $this->method_name) . ' ' . trans($this->module_name . '.single');

        // $aboutMenu = $this->getMenuByName('abouts');
        // $serviceMenu = $this->getMenuByName('services');
        // $newsMenu = $this->getMenuByName('news');
        // $workshopMenu = $this->getMenuByName('workshops');
        // $partnerMenu = $this->getMenuByName('partners');
        // $productMenu = $this->getMenuByName('products');
        // $engineeringMenu = $this->getMenuByName('engineerings');

        $abouts = About::active()->orderByRaw('-item_order DESC')->get();
        $generalSetting = Setting::find(1);
        $sliders = Slider::active()->orderByRaw('-item_order DESC')->get();
        $brands = Brand::active()->with('categories')->orderByRaw('-item_order DESC')->get();
        $trending_products = Product::active()->orderByRaw('-item_order DESC')->get();
        $socials = SocialMedia::active()->orderByRaw('-item_order DESC')->where('status', 1)->get();
        $news = News::active()->orderByRaw('-item_order DESC')->orderBy('id', 'DESC')->get();
        // $services = Service::active()->orderByRaw('-item_order DESC')->orderBy('id', 'DESC')->get();
        $main_categories = ProductCategory::active()->where('parent_id',null)->orderByRaw('-item_order DESC')->orderBy('id', 'DESC')->get();
        $menus = Menu::orderByRaw('-item_order DESC')->get();
        $contacts = Contact::find(1);
        $products = Product::take(9)->get();
        $portfolios = Portfolio::active()->get();
        $home = trans('frontend.home');
        $pageSetting = $this->getMenuByName($this->module_name);
        $contactMenu = $this->getMenuByName('contacts');
        $bunner_photo = Menu::findOrFail(3)->image_path;
        view()->share([
            'root' => $this->module_name,
            'asset_version' => $this->asset_version,
            'module_name' => $this->module_name,
            'module_title' => $this->module_title,
            'method_name' => $this->method_name,
            'method_title' => $this->method_title,
            'sliders' => $sliders,
            'abouts' => $abouts,
            'brands' => $brands,
            'trending_products' => $trending_products,
            'main_categories' => $main_categories,
            'news' => $news,
            'products' => $products ,
            'portfolios' => $portfolios ,
            'generalSetting' => $generalSetting ,
            // 'serviceMenu' => $serviceMenu,
            // 'workshopMenu' => $workshopMenu,
            // 'newsMenu' => $newsMenu,
            // 'partnerMenu' => $partnerMenu,
            // 'engineeringMenu' => $engineeringMenu,
            // 'productMenu' => $productMenu,
            'menus' => $menus,
            'socials' => $socials,
            'contacts' => $contacts,
            'home' => $home,
            'frontend_folder' => $this->frontend_folder,
            'frontend_includes_folder' => $this->frontend_includes_folder,
            'frontend_components_folder' => $this->frontend_components_folder,
            'pageSetting' => $pageSetting,
            'pageTitle' => $pageSetting['title'] ?? $home,
            'contactMenu' => $contactMenu,
            'bunner_photo' => $bunner_photo,
            'uploads_folder' => $this->uploads_folder,
        ]);
    }

    protected function getControllerName()
    {
        return str_replace('Controller', '', class_basename($this));
    }

    public function getMenuByName($name)
    {
        return Menu::where('name', $name)->get()->first();
    }
}
