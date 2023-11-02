<?php
//
//use App\Http\Controllers\Api\FileController;
//use App\Http\Controllers\Api\FileLabelController;
//use App\Http\Controllers\Api\LabelController;
//use App\Http\Controllers\Api\CategoryController;
//use App\Http\Controllers\Api\LoginController;
//use App\Http\Controllers\Api\RegisterController;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Route;
//
//Route::post('register', [RegisterController::class, 'store']);
//Route::post('login', [LoginController::class, 'store']);
//Route::post('logout', [LoginController::class, 'destroy']);
//
//Route::group(
//    [
//        'middleware' => ['auth:sanctum'],
//    ],
//    function () {
//        Route::get('/user', function (Request $request) {
//            return $request->user();
//        });
//
//        Route::get('file/{file}/download', [FileController::class, 'download'])->name('file.download');
//
//        Route::resource('file', FileController::class);
//        Route::resource('label', LabelController::class);
//        Route::resource('file-label', FileLabelController::class);
//        Route::resource('category', CategoryController::class);
//    }
//);
