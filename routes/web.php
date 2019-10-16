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
    Route::get('pricing/show/{id}', [\App\Http\Controllers\Site\PricingController::class, 'show'])->name('pricing.show');
    Route::post('pricing/store', [\App\Http\Controllers\Site\PricingController::class, 'store'])->name('pricing.store');
    Route::get('pricing/edit/{id}', [\App\Http\Controllers\Site\PricingController::class, 'edit'])->name('pricing.edit');
    Route::patch('pricing/update', [\App\Http\Controllers\Site\PricingController::class, 'update'])->name('pricing.update');
    Route::patch('pricing/destroy/{id}', [\App\Http\Controllers\Site\PricingController::class, 'destroy'])->name('pricing.destroy');

    // User Management
    Route::get('users', [\App\Http\Controllers\Site\UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [\App\Http\Controllers\Site\UserController::class, 'create'])->name('users.create');
    Route::post('users/store', [\App\Http\Controllers\Site\UserController::class, 'store'])->name('users.store');
    Route::get('users/edit/{id}', [\App\Http\Controllers\Site\UserController::class, 'edit'])->name('users.edit');
    Route::get('users/show/{id}', [\App\Http\Controllers\Site\UserController::class, 'show'])->name('users.show');
    Route::patch('users/update', [\App\Http\Controllers\Site\UserController::class, 'update'])->name('users.update');
    Route::patch('users/destroy/{id}', [\App\Http\Controllers\Site\UserController::class, 'destroy'])->name('users.destroy');
    Route::resource('users', 'Site\\UserController');

    // Company
    Route::get('company', [\App\Http\Controllers\Site\CompanyController::class, 'index'])->name('company.index');
    Route::get('company/create', [\App\Http\Controllers\Site\CompanyController::class, 'create'])->name('company.create');
    Route::get('company/store', [\App\Http\Controllers\Site\CompanyController::class, 'store'])->name('company.store');
});

// Route Front End
Route::get('/', 'PageController@index')->name('index');
Route::get('/blog', 'PageController@blog')->name('blog');

// Contact
Route::post('/contact-send', 'ContactController@store')->name('contact-send');

Auth::routes();

// Remove Register
Route::match(["GET", "POST"], "/register", function () {
    return redirect("/login");
})->name("register");

Route::get('/home', 'HomeController@index')->name('home');
