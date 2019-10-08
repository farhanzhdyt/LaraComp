<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route BackEnd
Route::group(['prefix' => 'site'], function (){
    Route::get('/', [\App\Http\Controllers\Site\PageController::class, 'index'])->name('dashboard');
    
    // Products
    Route::get('products', [\App\Http\Controllers\Site\ProductController::class, 'index'])->name('products.index');
    Route::get('products/{id}', [\App\Http\Controllers\Site\ProductController::class, 'show'])->name('products.detail');
    Route::get('products/create', [\App\Http\Controllers\Site\ProductController::class, 'create'])->name('products.create');

    // Pricing
    Route::get('pricing', [\App\Http\Controllers\Site\PricingController::class, 'index'])->name('pricing.index');
    Route::get('pricing/create', [\App\Http\Controllers\Site\PricingController::class, 'create'])->name('pricing.create');
    Route::post('pricing/store', [\App\Http\Controllers\Site\PricingController::class, 'store'])->name('pricing.store');
    Route::get('pricing/edit/{id}', [\App\Http\Controllers\Site\PricingController::class, 'edit'])->name('pricing.edit');
});

// Route Front End
Route::get('/', 'PageController@index')->name('home');
Route::get('/blog', 'PageController@blog')->name('blog');

Auth::routes();

// Remove Register
Route::match(["GET", "POST"], "/register", function () {
    return redirect("/login");
})->name("register");

Route::get('/home', 'HomeController@index')->name('home');
