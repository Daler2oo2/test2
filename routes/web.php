<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::controller(PostController::class)->group(function(){
    Route::get('/post/all/{order?}/{dir?}','index')->name('home');
    Route::get('/post/{id}','show')->where('id', '[0-9]+')->name('post.show');
    Route::get('/post/new','create')->name('post.create');
    Route::post('/post/add','store')->name('post.store');
    Route::get('/post/edit/{id}','edit')->where('id', '[0-9]+')->name('post.edit');
    Route::post('/post/update/{id}','update')->where('id', '[0-9]+')->name('post.update');
    //удалить
    Route::get('/post/force_del/{id}','forceDelete')->where('id', '[0-9]+')->name('post.force_del');
    //мягкое удаление
    Route::get('/post/del/{id}','destroy')->where('id', '[0-9]+')->name('post.del');
    //востановить 
    Route::get('/post/res/{id}','restore')->where('id', '[0-9]+')->name('post.res');
    //востановить все
    Route::get('/post/res_all','restoreAll')->where('id', '[0-9]+')->name('post.res_all');
    //список удалини стати 
    Route::get('/post/del_all','getDelete')->name('post.getDelete');
   
});
