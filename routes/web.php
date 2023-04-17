<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\UpdateEnvController;

Route::get('/', [HomeController::class,'index']);
Route::get('/sendmail', [SendEmailController::class,'sendEmail']);
Route::get('/update-env', [UpdateEnvController::class,'showForm']);
Route::post('/update-env', [UpdateEnvController::class,'saveForm'])->name('update-env');

Route::get('/contact', [HomeController::class,'contact'])->name('contact');
Route::post('/contact', [HomeController::class,'sendEmail'])->name('sendEmail');

Route::get('/search', 'ArticleController@search')->name('articles.search');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Illuminate\Http\Request $request) {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        // Authentication was successful
        return redirect()->intended('/admin');
    } else {
        // Authentication failed
        return back()->withErrors(['login' => 'Tài khoản hoặc mật khẩu không chính xác']);
    }
})->name('auth');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});
Route::get('/signup', [HomeController::class,'signup'])->name('signup');
Route::post('/signup', [HomeController::class,'UserStore'])->name('userstore');
Route::resource('articles', 'ArticleController');
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', [HomeController::class,'HomeIndex'])->name('admin');
    Route::resource('categories', 'CategoryController');
    Route::resource('auths', 'AuthController');
    Route::resource('users', 'UserController');
    Route::get('user/deleted', 'UserController@softDeleted')->name('users.deleted');
    Route::put('user/{user}/restore', 'UserController@restore')->name('users.restore');
    Route::delete('user/{user}/force-delete', 'UserController@forceDelete')->name('users.forceDelete');

    Route::get('category/deleted', 'CategoryController@softDeleted')->name('categories.deleted');
    Route::put('category/{category}/restore', 'CategoryController@restore')->name('categories.restore');
    Route::delete('category/{category}/force-delete', 'CategoryController@forceDelete')->name('categories.forceDelete');

    Route::get('article/deleted', 'ArticleController@softDeleted')->name('articles.deleted');
    Route::put('article/{article}/restore', 'ArticleController@restore')->name('articles.restore');
    Route::delete('article/{article}/force-delete', 'ArticleController@forceDelete')->name('articles.forceDelete');
});

