<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\CuponController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Frontend\FrontenController;
use App\Http\Controllers\Frontend\FrontendUserController;
use App\Http\Controllers\Backend\ParentcategoriesController;
use App\Http\Controllers\Frontend\CategoryProductController;
use App\Http\Controllers\Frontend\FrorntendUserRegisterController;
use App\Http\Controllers\Frontend\ShippingController;
use App\Http\Controllers\ShippingChargeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Auth::routes();


Route::prefix('backend')->group(function () {




    Route::group(['middleware' => ['role_or_permission:Super Admin']], function () {




            Route::get('/home', [BackendController::class, 'index'])->name('home');


            Route::resource('/banner', BannerController::class)->except([
                'show'
            ]);

            Route::get('/banner/status/{banner}', [BannerController::class , 'statusUpdate'])->name('banner.status');
            Route::get('/banner/restore/{id}',[BannerController::class , 'BannerRestore'])->name('banner.restore');
            Route::get('/banner/parmanent/delete/{id}',[BannerController::class , 'parmanentDelete'])->name('banner.parmanent.delete');


            Route::resource('parentcategory', ParentcategoriesController::class)->except([
                'create'
            ]);




            Route::resource('/category', CategoryController::class)->except([
                'create',
                'show',
            ]);
            Route::get('/category/status/{category}', [CategoryController::class, 'categoryStatus'])->name('category.status');
            Route::get('/category/deletecategory/{category}', [CategoryController::class, 'deletedCategory'])->name('category.delete');


            // Size Web Route

            Route::resource('/size', SizeController::class)->except([
                'create',
                'show',
            ]);
            Route::get('/size/status/{size}',[SizeController::class, 'sizeStatus'])->name('size.status');
            Route::get('/size/restore/{size}',[SizeController::class, 'sizeRestore'])->name('size.restore');
            Route::get('/size/parmanentdelete/{size}',[SizeController::class, 'parmanentDelete'])->name('size.parmanentdelete');

            //color web route

            Route::resource('/color', ColorController::class)->except([
                'create',
                'show',
            ]);
            Route::get('/color/status/{color}', [ColorController::class, 'colorStatus'])->name('color.status');
            Route::resource('/product', ProductController::class);
            Route::get('/product/status/{product}',[ProductController::class, 'statusUpdate'])->name('product.status');


            // Cupon Code Route
            Route::resource('/cupon', CuponController::class)->except([
                'create',
                'show',
            ]);

            Route::get('/shipping-charge',[ShippingChargeController::class, 'index'])->name('shipping.charge');
            Route::post('/shipping-charge',[ShippingChargeController::class, 'store'])->name('shipping.charge');

            // Country Route

            Route::get('/country', [CountryController::class, 'index'])->name('country');
            Route::post('/country/store', [CountryController::class, 'store'])->name('country.store');

            // Citis Route

            Route::get('/city', [CityController::class, 'index'])->name('city');
            Route::post('/city/store', [CityController::class, 'store'])->name('city.store');


        });




});



 // Fronten Controller Route

Route::get('/', [FrontenController::class, 'frontEnd'])->name('frontend');

Route::post('/autocomplete',[FrontenController::class, 'autocomplete'])->name('autocomplete');


 // CategoryProduc Controller Route

Route::get('/category/{id}', [CategoryProductController::class, 'Show'])->name('category');



 // FrorntendUserRegister Controller Route

Route::get('/user/register',[FrorntendUserRegisterController::class, 'register'])->name('user.register');
Route::post('/user/register',[FrorntendUserRegisterController::class, 'store'])->name('user.register');


 // FrontendUser Controller Route

 Route::get('/user/dashboard',[FrontendUserController::class, 'index'])->name('user.dashboard');


// Shop Controller Route

Route::get('/shop',[ShopController::class, 'shop'])->name('shop');
Route::get('/shop-details/{slug}/{id}', [ShopController::class, 'shopDetails'])->name('shop-details');
Route::get('/banner-details/{id}/{slug}', [FrontenController::class, 'bannerDetails'])->name('banner-details');


// Cart Controller Route

Route::post('/addcard', [CartController::class, 'AddCard'])->name('add.card')->middleware('auth');
Route::get('/viewcard', [CartController::class, 'viewcard'])->name('view.card')->middleware('auth');
Route::get('/delete/{id}', [CartController::class, 'delete'])->name('delete')->middleware('auth');
Route::post('/applycoupon', [CartController::class, 'applyCoupon'])->name('applycoupon')->middleware('auth');
Route::post('/updatecard', [CartController::class, 'CardUpdate'])->name('updatecard')->middleware('auth');


Route::post('/shippingcharge', [CartController::class, 'shippingCharge'])->name('shippingcharge')->middleware('auth');
Route::post('/shippingcharge/update/{id}', [CartController::class, 'shippingChargeUpdate'])->name('shippingcharge.update')->middleware('auth');



// Shipping Route

Route::get('/shipping', [ShippingController::class, 'shippingDetails'])->name('shipping')->middleware('auth');
// Route::get('/selectcity/{id}', [ShippingController::class, 'getCity'])->name('selectcity')->middleware('auth');

Route::post('/selectcity', [ShippingController::class, 'getCity'])->name('selectcity')->middleware('auth');


Route::post('/order', [ShippingController::class, 'order'])->name('order')->middleware('auth');
Route::get('/confirm', [ShippingController::class, 'confirm'])->name('confirm.order')->middleware('auth');
Route::get('/emails', [ShippingController::class, 'emails'])->name('confirm.emails')->middleware('auth');





Route::get('/test',[HomeController::class, 'testRoute']);




