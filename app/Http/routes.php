<?php

Route::group(['middleware' => ['web']], function () {



    Route::get('/login', 'IndexController@load');

    Route::get('/logout', function () {
        return redirect('auth/logout');
    });

    Route::post('auth/login', 'CustomAuthController@authenticate');
    Route::get('auth/logout', 'CustomAuthController@logout');

    //Fully authenticated
    Route::group(['middleware' => 'auth'], function() {

        //VIEW NOT BEHIND SPECIFIC PERMISSIONS EXPECT PLAIN AUTHORISED
        Route::get('/dashboard', function () {
            return view('templates.dashboard');
        });

        Route::post('api/get/something', 'CustomAuthController@authenticate');
    });
});