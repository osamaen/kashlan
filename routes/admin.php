<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\NewsLetterController;
use App\Http\Controllers\Admin\PortfolioController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::macro('newResource', function ($uri, $controller, $except = []) {
    Route::post("{$uri}/active/{id}", "{$controller}@active")->name("{$uri}.active");
    Route::post("{$uri}/is_expert/{id}", "{$controller}@is_expert")->name("{$uri}.is_expert");
    Route::post("{$uri}/is_by_expert/{id}", "{$controller}@is_by_expert")->name("{$uri}.is_by_expert");
    Route::post("{$uri}/set_order/{id}", "{$controller}@set_order")->name("{$uri}.set_order");
    Route::delete("{$uri}/delete_image/{id}", "{$controller}@delete_image")->name("{$uri}.delete_image");
    Route::delete("{$uri}/restore/{id}", "{$controller}@restore")->name("{$uri}.restore");
    Route::delete("{$uri}/force_delete/{id}", "{$controller}@force_delete")->name("{$uri}.force_delete");

    Route::get("{$uri}/create_other_image/{id}", "{$controller}@create_other_image")->name("{$uri}.create_other_image");
    Route::delete("{$uri}/delete_other_image/{id}", "{$controller}@delete_other_image")->name("{$uri}.delete_other_image");
    Route::get("{$uri}/show_other_images/{id}", "{$controller}@show_other_images")->name("{$uri}.show_other_images");
    Route::post("{$uri}/store_other_image", "{$controller}@store_other_image")->name("{$uri}.store_other_image");

    Route::resource(
        $uri,
        $controller
    )->except($except);
});












Route::middleware('auth:admin')->group(function () {
    Route::get('/cp', [HomeController::class, 'index'])->name('dashboard');

    Route::prefix('cp')->group(function () {

    Route::newResource('home', HomeController::class);
    Route::newResource('sliders', SliderController::class);
    Route::newResource('news', NewsController::class);
    Route::newResource('products', ProductController::class);
    Route::newResource('product_categories', ProductCategoryController::class);
    Route::newResource('brands', BrandController::class);
    Route::newResource('contacts', ContactsController::class);
    Route::newResource('abouts', AboutController::class);
    Route::newResource('menus', MenuController::class);
    Route::newResource('social_media',SocialMediaController::class);
    Route::newResource('settings',SettingController::class);
    Route::newResource('news_letters',NewsLetterController::class);
    Route::newResource('portfolios',PortfolioController::class);


    Route::get('product_categories/{id}/create_product_categories',[ProductCategoryController::class,'create_product_categories'])->name('product_categories.create_product_categories');
    Route::get('product_categories/{id}/show_product_categories', [ProductCategoryController::class,'show_product_categories'])->name('product_categories.show_product_categories');
    Route::post("menus/in_nav/{id}",[MenuController::class,'inNav'])->name("menus.in_nav");
    Route::post('news/at_home/{id}',[NewsController::class,'setAtHome'])->name('news.athome');
    
    // Route::resources([
        // 'sliders' => SliderController::class,
        // 'news' => NewsController::class,
        // 'products' => ProductController::class,
        // 'product_categories' => ProductCategoryController::class,
        // 'brands' => BrandController::class,
        // 'contacts' => ContactsController::class,
        // 'abouts' => AboutController::class,
        // ]);
    });
});


require __DIR__.'/auth.php';
