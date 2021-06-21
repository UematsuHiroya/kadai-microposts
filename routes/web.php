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


// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// 以下の操作はログイン時のみ動作
Route::group(['middleware' => ['auth']], function () {
    
    // フォローに関するルーティング
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
    });
    
    // ユーザ詳細に関するルーティング
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    
    // 投稿に関するルーティング
    Route::resource("microposts", "MicropostsController", ["only" => ["store", "destroy"]]);
    Route::get("microposts/{id}", "MicropostsController@delete")->name("microposts.delete");
    Route::get("microposts","MicropostsController@back")->name("microposts.back");
    
    // お気に入り追加/解除のルーティング
    Route::group(["prefix" => "microposts/{id}"],function() {
        Route::post("favorite", "FavoritesController@store")->name("favorites.favorite");
        Route::delete("unfavorite", "FavoritesController@destroy")->name("favorites.unfavorite");
    });
    
    // ユーザのお気に入り一覧のルーティング
    Route::group(['prefix' => 'users/{id}'], function() {
        Route::get("favorites", "UsersController@favorites")->name("users.favorites");
    });
});

// トップページ
Route::get('/', 'MicropostsController@index');

Route::get("lang/{lang}", "LanguageController@switchLang")->name("lang.switch");
