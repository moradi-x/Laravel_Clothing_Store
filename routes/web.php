<?php

use App\Http\Controllers\admin\AttributeController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Auth\AuthControllser;
use App\Http\Controllers\Home\AddressController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\CategoryController as HomeCategoryController;
use App\Http\Controllers\Home\CommentController as HomeCommentController;
use App\Http\Controllers\Home\CompareController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\ProductController as HomeProductController;
use App\Http\Controllers\Home\UserProfileController;
use App\Http\Controllers\Home\WishlistController;
use App\Models\User;
use App\Models\Wishlist;
use App\Notifications\OTPSms;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Route;

use Ipe\Sdk\Facades\SmsIr;

//   داشبرد
Route::get('/admin-panel/management/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

// ادمین 
Route::prefix('/admin-panel/management')->name('admin.')->group(function () {
    Route::resource('brands', BrandController::class);
    Route::resource('attributes', AttributeController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('products', ProductController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('coupons', CouponController::class);

    Route::get('/comments/{comment}/change-approve', [CommentController::class, 'changeApprove'])->name('comments.change-approve');

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

// صفحه اصلی و فروشگاه و سینگل محصول و فرستادن کامنت 
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/categories/{category:slug}', [HomeCategoryController::class, 'show'])->name('home.categories.show');
Route::get('/products/{product:slug}', [HomeProductController::class, 'show'])->name('home.products.show');
Route::post('/comments/{product}', [HomeCommentController::class, 'store'])->name('home.comments.store');

// علاقه مندی های محصول 
Route::get('/add-to-wishlist/{product}', [WishlistController::class, 'add'])->name('home.wishlist.add');
Route::get('/remove-from-wishlist/{product}', [WishlistController::class, 'remove'])->name('home.wishlist.remove');

// مقایسه محصول 
Route::get('/compare', [CompareController::class, 'index'])->name('home.compare.index');
Route::get('/add-to-compare/{product}', [CompareController::class, 'add'])->name('home.compare.add');
 Route::get('/remove-from-compare/{product}', [CompareController::class, 'remove'])->name('home.compare.remove');

// سبد خرید
Route::post('/add-to-cart/', [CartController::class, 'add'])->name('home.cart.add');
Route::get('/cart/', [CartController::class, 'index'])->name('home.cart.index');
Route::put('/cart/', [CartController::class, 'update'])->name('home.cart.update');
Route::get('/remove-from-cart/{rowId}', [CartController::class, 'remove'])->name('home.cart.remove');
Route::get('/clear-cart/', [CartController::class, 'clear'])->name('home.cart.clear');
Route::post('/check-coupon/', [CartController::class, 'chehkCoupon'])->name('home.coupons.check');
Route::get('/checkout/', [CartController::class, 'checkout'])->name('home.arders.checkout');


// احراز هویت معمولی 
// Route::get('/test', function () {
//     auth()->logout();
// });
// احراز هویت با اکانت گوگل outh
// Route::get('login/{provider}', [AuthControllser::class, 'redirectToProvider'])->name('provider.login');
// Route::get('login/{provider}/callback', [AuthControllser::class, 'handleProviderCallback']); 

// احراز هویت با otp سامانه پیامکی
Route::any('login', [AuthControllser::class, 'login'])->name('login') ; 
Route::post('check-otp', [AuthControllser::class, 'checkOtp']) ; 
Route::post('resend-otp', [AuthControllser::class, 'resendOtp']) ; 

// پروفابل کاربر 
Route::prefix('/profile')->name('home.')->group(function () {
  Route::get('/', [UserProfileController::class, 'index'])->name('users_profile.index');
  Route::get('/comments', [HomeCommentController::class, 'usersProfileIndex'])->name('comments.users_profile.index');
  Route::get('/wishlist', [WishlistController::class, 'usersProfileIndex'])->name('wishlist.users_profile.index');

  // ادرس کاربر
  Route::get('/addresses', [AddressController::class, 'index'])->name('addresses.index');
  Route::post('/addresses', [AddressController::class, 'store'])->name('addresses.store');
  Route::put('/addresses/{addresses}', [AddressController::class, 'update'])->name('addresses.update');
});

// روت گرفتن استان و شهر در قسمت پروفایل
Route::get('/get-province-cities', [AddressController::class, 'getProvinceCitiesList'])
    ->name('getProvinceCitiesList');


// Route::get('/test', function () {
//     $user = User::find(1);
//     $user->notify(new OTPSms(11228));
// });

// Route::get('/test', function () {
//     dd(session()->get('compareProduct')) ;
// });


Route::get('/test', function () {
    // CartFacade::clear();
    dd(CartFacade::getContent()) ;
});
