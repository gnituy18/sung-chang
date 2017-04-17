<?php
use App\Models\Photo;

$domainName = explode('://', config('app.url'))[1];

Route::group(['domain' => 'admin.'.$domainName], function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin.index');
    Route::get('login', 'Admin\AdminController@login')->name('login');
    Route::post('resetpw', 'Admin\AdminController@resetPassword')->name('resetpw');
    Route::post('authenticate', 'Admin\AdminController@authenticate')->name('authenticate');

    Route::group(['middleware' => 'auth'], function () {
        // Photos
        Route::group(['prefix' => 'photos'], function () {
            Route::post('{product}', 'Admin\PhotoController@store')->name('photos.store');
            Route::delete('{photo}', 'Admin\PhotoController@destroy')->name('photos.destroy');
            Route::put('{photo}', 'Admin\PhotoController@update')->name('photos.update');
            Route::get('{photo}/up', 'Admin\PhotoController@up')->name('photos.up');
            Route::get('{photo}/down', 'Admin\PhotoController@down')->name('photos.down');
        });

        // Others
        Route::get('others', 'Admin\AdminController@functions')->name('others');

        // Collection
        Route::group(['prefix' => 'Collection'], function () {
            Route::get('/', function () {
                return view('admin.product.collection', ['photos' => Photo::where('product_id', 1)->get()]);
            })->name('products.collection');
            Route::get('{others}', function () {
                return redirect()->route('products.collection');
            });
        });

        Route::group(['prefix' => '{category}'], function () {
            Route::get('/', 'Admin\ProductController@index')->name('products.index');
            Route::post('/', 'Admin\ProductController@store')->name('products.store');
            Route::get('{product}', 'Admin\ProductController@show')->name('products.show');
            Route::put('{product}', 'Admin\ProductController@update')->name('products.update');
        });

        Route::resource('products', 'Admin\ProductController', ['except' => ['update', 'store', 'create', 'index', 'show']]);
    });
});

Route::get('/', function () {
    return view('about', [ ]);
})->name('about');

Route::get('log', function () {
    return view('log');
})->name('log');

Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::get('{product}', function (App\Models\Product $product) {
    return view('product', ['activeProduct'=> $product, 'currentCategory' => $product->category]);
})->name('product');
