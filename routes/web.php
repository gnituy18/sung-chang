<?php

$domainName = explode('://', config('app.url'))[1];

Route::group(['domain' => 'admin.'.$domainName], function () {
    Route::get('/', 'Admin\AdminController@index');
    Route::get('login', 'Admin\AdminController@login')->name('login');

    Route::post('authenticate', 'Admin\AdminController@authenticate')->name('authenticate');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('products/create/{category}', 'Admin\ProductController@create')->name('products.create');
        Route::post('photos/{product}', 'Admin\PhotoController@store')->name('photos.store');
        Route::get('photos/{photo}', 'Admin\PhotoController@destroy')->name('photos.destroy');
        Route::resource('products', 'Admin\ProductController', ['except' => ['create']]);
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
