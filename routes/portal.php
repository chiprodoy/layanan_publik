<?php

use App\Http\Controllers\PermintaanLayananController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::prefix('/portal')->middleware(['auth'])->group(function(){
    Route::get('/', [App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');
    //Route::get('post', [App\Http\Controllers\PostController::class,'index'])->name('post.index');

    // Route::prefix('permintaan_layanan')->group(function(){
    //     Route::get('/',[PermintaanLayananController::class,'index'])->name('permintaan_layanan.index');
    //     Route::get('/create/{id}',[PermintaanLayananController::class,'create'])->name('permintaan_layanan.create');

    // });

    Route::prefix('permintaan')->group(function(){
        Route::get('/{jenis_layanan}',[PermintaanLayananController::class,'browse'])->name('permintaan.index');
        Route::get('/{jenis_layanan}/create',[PermintaanLayananController::class,'browseCreate'])->name('permintaan.create');
        Route::get('/{jenis_layanan}/edit',[PermintaanLayananController::class,'browseEdit'])->name('permintaan.edit');
        Route::get('/{jenis_layanan}/show',[PermintaanLayananController::class,'browseShow'])->name('permintaan.show');
        Route::post('/{jenis_layanan}',[PermintaanLayananController::class,'browseStore'])->name('permintaan.store');
        Route::delete('/{jenis_layanan}',[PermintaanLayananController::class,'browseStore'])->name('permintaan.destroy');
        Route::post('/{jenis_layanan}/updatestatus',[PermintaanLayananController::class,'updateStatus'])->name('permintaan.updatestatus');

    });

    Route::resource('permintaan_layanan',PermintaanLayananController::class);

    Route::resource('jenis_layanan',App\Http\Controllers\JenisLayananController::class);



    Route::resource('post',App\Http\Controllers\PostController::class);
    Route::resource('category',App\Http\Controllers\PostCategoryController::class);
    Route::get('/tes',function(){
        Log::critical('hello');
    });
    Route::get('/browse/{categoryslug}/create',[App\Http\Controllers\PostController::class,'browseCreate'])->name('browse.create');
    Route::get('/browse/{categoryslug}',[App\Http\Controllers\PostController::class,'browse'])->name('browse.index');
    Route::get('/browse/{categoryslug}/{uid}/edit',[App\Http\Controllers\PostController::class,'browseEdit'])->name('browse.edit');
    Route::get('/browse/{categoryslug}/{uid}/show',[App\Http\Controllers\PostController::class,'browseShow'])->name('browse.show');
    Route::put('/browse/{categoryslug}/{uid}',[App\Http\Controllers\PostController::class,'browseUpdate'])->name('browse.update');
    Route::post('/browse/{categoryslug}/create',[App\Http\Controllers\PostController::class,'browseStore'])->name('browse.store');

    // Route::prefix('browse')->group(function(){
    //     Route::get('/{categoryslug}', [App\Http\Controllers\PostController::class,'browse'])->name('browse.index');
    // });
    Route::resource('user',App\Http\Controllers\UserController::class);
    Route::resource('comment',App\Http\Controllers\CommentController::class);

    Route::post('ckeditor/upload', [App\Http\Controllers\FileController::class,'ckeditorupload'])->name('ckeditor.image-upload');

    Route::prefix('galeri')->group(function () {
        Route::get('/', [GaleriController::class, 'index'])->name('admin.galeri.index');

        Route::get('/{galeri}', [GaleriController::class, 'show'])->name(
            'admin.galeri.show'
        );
        Route::get('/edit/{galeri}', [GaleriController::class, 'edit'])->name(
            'admin.galeri.edit'
        );
        Route::post('/', [GaleriController::class, 'store'])->name('admin.galeri.store');
        Route::patch('/{galeri}', [GaleriController::class, 'update'])->name(
            'admin.galeri.update'
        );
        Route::delete('/{galeri}', [GaleriController::class, 'destroy'])->name(
            'admin.galeri.destroy'
        );
    });

    Route::prefix('media')->group(function () {
        Route::get('/', [MediaWebController::class, 'index'])->name(
            'media.index'
        );
        Route::get('/{media}', [MediaWebController::class, 'show'])->name(
            'media.show'
        );
        // Route::get('/edit/{media}', [MediaWebController::class, 'edit'])->name(
        //     'media.edit'
        // );
        Route::post('/', [MediaWebController::class, 'store'])->name('media.store');
        Route::patch('/{media}', [MediaWebController::class, 'update'])->name(
            'media.update'
        );
        Route::delete('/{media}', [MediaWebController::class, 'destroy'])->name(
            'media.destroy'
        );
    });


    Route::get('/tes',function(){
        Log::critical('hello');
    });


});
