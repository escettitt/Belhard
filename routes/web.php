<?php

use Illuminate\Support\Facades\Route;

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
    // $posts = DB::table('news')->get();
    $posts = App\News::all();
    return view('main', compact('posts'));
});
Route::get('/posts/{post}', function ($id) {
    $post = DB::table('news')->find($id);
    return view('post', compact('post'));
});
Route::get('/edit/{post}', function ($id) {
    $post = DB::table('news')->find($id);
    return view('edit', compact('post'));
})->middleware('auth');
Route::post('/edit','NewsController@update');
Route::get('/editor', function () {
    return view('editor');
})->middleware('auth');
Route::post('/editor/post','NewsController@create');

Auth::routes();

// Route::get('auth/login', function(){
//     return view('auth/login');
// });
// Route::post('auth/login', 'Auth\AuthController@postLogin');
// Route::get('auth/logout', 'Auth\AuthController@getLogout');
