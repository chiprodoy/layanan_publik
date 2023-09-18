<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class,'index'])->name('index');

Route::prefix('post')->group(function(){

    Route::get('/',[PostController::class,'index'])->name('public.post.index');


    Route::get('/{slug}',[WelcomeController::class,'post'])->name('public.post.show');

});

Route::get('/category/{slug}',[WelcomeController::class,'blog'])->name('public.post.category');

Route::prefix('page')->group(function(){

    Route::get('/',[PageController::class,'index'])->middleware('auth:sanctum')->name('page.index');
    Route::get('/{slug}',[PageController::class,'show'])->name('page.show');

});



require __DIR__.'/auth.php';
require __DIR__.'/portal.php';

