<?php

use App\Http\Controllers\admin\AttributeController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Auth\AuthControllser;
use App\Http\Controllers\Home\CategoryController as HomeCategoryController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\ProductController as HomeProductController;
use Illuminate\Support\Facades\Route;

use Ipe\Sdk\Facades\SmsIr;


Route::get('/admin-panel/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');


Route::prefix('/admin-panel/management')->name('admin.')->group(function () {
    Route::resource('brands', BrandController::class);
    Route::resource('attributes', AttributeController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('products', ProductController::class);
    Route::resource('banners', BannerController::class);

    Route::get('/category-attribute/{category}', [CategoryController::class, 'getCategoryAttribute']);

    // edit product images
    Route::get('/products/{product}/images-edit', [ProductImageController::class, 'edit'])
        ->name('products.images.edit');

    Route::delete('/products/{product}/images-destroy', [ProductImageController::class, 'destroy'])
        ->name('products.images.destroy');

    Route::put('/products/{product}/images-set-edit', [ProductImageController::class, 'setPrimary'])
        ->name('products.images.set_primary');

    Route::post('/products/{product}/image-add', [ProductImageController::class, 'add'])
        ->name('products.images.add');

    // edit product category
    Route::get('/products/{product}/category-edit', [ProductController::class, 'editCategory'])
        ->name('products.category.edit');

    Route::put('/products/{product}/category-update', [ProductController::class, 'updateCategory'])
        ->name('products.category.update');
});

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/categories/{category:slug}', [HomeCategoryController::class, 'show'])->name('home.categories.show');
Route::get('/products/{product:slug}', [HomeProductController::class, 'show'])->name('home.products.show');
Route::get('login/{provider}', [AuthControllser::class, 'redirectToProvider'])->name('provider.login');
Route::get('login/{provider}/callback', [AuthControllser::class, 'handleProviderCallback']);

// Route::get('/test', function () {
//     auth()->logout();
// });

Route::get('/test', function () {
    $mobile = "09926245951"; // شماره موبایل گیرنده
    $templateId = 100000; // شناسه الگو
    $parameters = [
        [
            "name" => "Code",
            "value" => "1234555"
        ]
    ];
    $response = SmsIr::verifySend($mobile, $templateId, $parameters);
});
