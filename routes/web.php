<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home', [AdminController::class,'index']);
Route::get('/category_page', [AdminController::class,'category_page']);
Route::post('/add_category', [AdminController::class,'add_category']);
Route::get('/cat_delete/{id}', [AdminController::class,'cat_delete']);
Route::get('/edit_category/{id}', [AdminController::class,'edit_category']);
Route::post('/update_category/{id}', [AdminController::class,'update_category']);
Route::get('/add_book', [AdminController::class,'add_book']);
Route::post('/store_book', [AdminController::class,'store_book']);
Route::get('/show_book', [AdminController::class,'show_book']);
Route::get('/book_delete/{id}', [AdminController::class,'book_delete']);
Route::get('/edit_book/{id}', [AdminController::class,'edit_book']);
Route::post('/update_book/{id}', [AdminController::class,'update_book']);
Route::get('/book_details/{id}', [HomeController::class,'book_details']);
Route::get('/borrow_books/{id}', [HomeController::class,'borrow_books']);
Route::get('/borrow_request', [AdminController::class,'borrow_request']);
Route::get('/approve_book/{id}', [AdminController::class,'approve_book']);
Route::get('/return_book/{id}', [AdminController::class,'return_book']);
Route::get('/rejected_book/{id}', [AdminController::class,'rejected_book']);
Route::get('/book_history', [HomeController::class,'book_history']);
Route::get('/cancel_req/{id}', [HomeController::class,'cancel_req']);