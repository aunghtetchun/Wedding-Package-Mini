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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/show-blog', function () {
    return view('show-blog');
});
Route::get('/contact',function (){
    return view('contact');
});


Auth::routes();

Route::resource('/category','CategoryController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/sample', 'HomeController@sample')->name('sample');
Route::get('/edit','ProfileController@edit')->name('profile.edit');
Route::post('/change-password','ProfileController@changePassword')->name('profile.changePassword');
Route::post('/change-name','ProfileController@changeName')->name('profile.changeName');
Route::post('/change-email','ProfileController@changeEmail')->name('profile.changeEmail');
Route::post('/change-photo','ProfileController@changePhoto')->name('profile.changePhoto');
Route::resource('/category','CategoryController');
Route::resource('/wedding_package','WeddingPackageController');
Route::resource('/blog','BlogController');
Route::resource('/order','OrderController');
Route::resource('/photo','PhotoController');
Route::resource('/recommend','RecommendController');

Route::get('/recommend-list','WPController@recommendList')->name('recommend.recommendList');
Route::get('/package-list','WPController@packageList')->name('package.packageList');
Route::get('/blog-list','WPController@blogList')->name('blog.blogList');
Route::get('/blog-list/{id}','WPController@blogListFilter')->name('blog.blogList-filter');
Route::get('/single-blog-list/{id}','WPController@singleBlogList')->name('blog.single-blog-list');
Route::get('/order-package-/{id}','WPController@orderPackage')->name('order.orderPackage');
Route::resource('/package-detail','PackageDetailController');
Route::post('/package-filter','WPController@packageFilter')->name('package.packageFilter');

Route::post('/orderPackage','WPController@storeOrder')->name('orderPackage.storeOrder');
Route::post('/recommendPackage','WPController@storeRecommend')->name('recommendPackage.storeRecommend');
