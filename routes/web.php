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


use App\Brand;
use App\Category;




//frontend route

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('product/details/{id}','ProductController@productDetails')->name('product.details');

Route::get('products','ProductController@products')->name('products');

Route::get('products/by_category/{id}','ProductController@productsByCategory')->name('products.bycategory');

Route::get('products/by_brand/{id}','ProductController@productsByBrand')->name('products.bybrand');

Route::get('contact','ContactController@index')->name('contact.index');

Route::post('contact/submit','ContactController@sendMessage')->name('contact.sendmessage');

Route::get('blog/index','BlogController@index')->name('blog.index');

Route::get('blog/single','BlogController@blogSingle')->name('blog.single');


Route::get('dropdownlist/getdistrict/{id}', 'HomeController@getDistrict');




Route::group(['middleware'=>'auth'],function(){

    Route::get('cart/item','CartController@index')->name('cart');
    Route::get('get/cart/item','CartController@getCartitem');
    Route::post('cart/store/{id}','CartController@addtocard')->name('cart.store');
    Route::get('delete/cart/item','CartController@removeitem')->name('remove.item');
    Route::get('checkout','CartController@checkout')->name('checkout');
    Route::post('order','OrderController@storeOrder')->name('order');

});



//user related route


Route::group(['as'=>'user.','prefix'=>'user','middleware'=>['auth','user']], function (){

    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::get('product/view/{id}','DashboardController@viewProduct')->name('product.view');

    Route::get('profile','SettingController@index')->name('profile');
    Route::post('profile/update','SettingController@updateProfile')->name('profile.update');


});




//backend related route

Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function (){

    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('category','CategoryController');
    Route::resource('brand','BrandController');
    Route::resource('product','ProductController');


    Route::get('order','OrderController@index')->name('order.index');
    Route::get('order/view/{id}','OrderController@viewOrder')->name('order.view');
    Route::put('/order/{id}/approve','OrderController@OrderApproval')->name('order.approve');
    Route::put('/order/{id}/confirm','OrderController@orderComplete')->name('order.complete');
    Route::delete('/order/{id}/delete','OrderController@OrderDelete')->name('order.destroy');


    Route::get('contact','ContactController@index')->name('contact.index');
    Route::get('contact/view/{id}','ContactController@view')->name('contact.view');
    Route::delete('contact/delete/{id}','ContactController@destroy')->name('contact.destroy');


    Route::resource('slider','SliderController');
    Route::resource('payment','PaymenmethodController');


    Route::resource('division','DivisionController');
    Route::resource('district','DistrictController');



    Route::get('setting','SettingController@index')->name('setting');
    Route::put('profile-update','SettingController@updateProfile')->name('profile.update');
    Route::put('password-update','SettingController@updatePassword')->name('password.update');


});




//view  category and brand

View::composer('frontend.category_brand.index',function ($view) {
    $categories = App\Category::all();
    $brands = App\Brand::all();
       $view->with('categories',$categories);
       $view->with('brands',$brands);
});


//view slider

View::composer('layouts.frontend.partials.slider',function ($view) {
    $sliders = App\Slider::latest()->take(3)->get();
    $view->with('sliders',$sliders);

});





//testing route


Route::get('student','StudentController@index');
Route::get('delete/student/data', 'StudentController@deletedata');
Route::get('get/student/data', 'StudentController@getdata');