<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\BrandController;
use App\Http\Controllers\Frontend\ContactsController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ProductCategoryController;
use App\Http\Controllers\Frontend\NewsLetterController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\CaptchaController;
use Barryvdh\DomPDF\Facade\Pdf;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

Route::get('/', [HomeController::class , 'index'])->name('home');
Route::get('/about', [AboutController::class , 'index'])->name('about');
Route::get('/contacts', [ContactController::class , 'index'])->name('contacts');
Route::get('/products', [ProductController::class , 'index'])->name('products');
Route::get('/news', [NewsController::class , 'index'])->name('news');
Route::get('/brands', [BrandController::class , 'index'])->name('brands');
Route::get('/cart', [CartController::class , 'index'])->name('cart');




Route::get('sliders/{id}', [HomeController::class , 'show'])->name('sliders.details');
Route::get('products/{id}', [ProductController::class , 'show'])->name('products.details');
Route::get('brands/{id}', [BrandController::class , 'show'])->name('brands.details');
Route::get('news/{id}', [NewsController::class , 'show'])->name('news.details');
Route::get('categories/{id}', [ProductCategoryController::class , 'show'])->name('categories.details');



Route::get('captcha', [CaptchaController::class, 'generate']);

Route::post('send_email',[ContactController::class , 'send'])->name('send_email');
Route::post('send_news_letter',[NewsLetterController::class , 'send'])->name('send_news_letter');



Route::get('/v', function () {
          


    // Return the PDF as a download response
    return view('pdf_view',compact(''));
});






Route::get('/d', function () {
          
    $data = [
        'title' => 'My PDF Document',
        'content' => 'This is some content that will appear in the PDF.'
    ];

    // Load a view and pass in the data
    $pdf = Pdf::loadView('pdf_view', $data);

    // Return the PDF as a download response
    return $pdf->download('document.pdf');
});



});



require __DIR__.'/admin.php';