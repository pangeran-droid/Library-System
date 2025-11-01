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

Route::get('/home', [AdminController::class,'index'])->middleware(['auth']);

Route::middleware(['auth', 'admin'])->group(function () {
    // CATEGORY MANAGEMENT
    Route::get('/category_page', [AdminController::class,'category_page']);
    Route::post('/add_category', [AdminController::class,'add_category']);
    Route::get('/cat_delete/{id}', [AdminController::class,'cat_delete']);
    Route::get('/edit_category/{id}', [AdminController::class,'edit_category']);
    Route::post('/update_category/{id}', [AdminController::class,'update_category']);

    // BOOKS MANAGEMENT
    Route::get('/add_book', [AdminController::class,'add_book']);
    Route::post('/store_book', [AdminController::class,'store_book']);
    Route::get('/show_book', [AdminController::class,'show_book']);
    Route::get('/book_delete/{id}', [AdminController::class,'book_delete']);
    Route::get('/edit_book/{id}', [AdminController::class,'edit_book']);
    Route::post('/update_book/{id}', [AdminController::class,'update_book']);

    // BORROW MANAGEMENT
    Route::get('/borrow_request', [AdminController::class,'borrow_request'])->middleware(['auth', 'admin']);
    Route::get('/approved_book/{id}', [AdminController::class,'approved_book']);
    Route::get('/returned_book/{id}', [AdminController::class,'returned_book']);
    Route::get('/rejected_book/{id}', [AdminController::class,'rejected_book']);

    // USERS MANAGEMENT
    Route::get('/add_user', [AdminController::class, 'add_user'])->name('add_user');
    Route::post('/store_user', [AdminController::class, 'store_user'])->name('store_user');
    Route::get('/show_user', [AdminController::class, 'show_user'])->name('show_user');
    Route::get('/delete_user/{id}', [AdminController::class, 'delete_user'])->name('delete_user');
    Route::get('/edit_user/{id}', [AdminController::class, 'edit_user'])->name('edit_user');
    Route::post('/update_user/{id}', [AdminController::class, 'update_user'])->name('update_user');

    // GENERATE QR CODE
    Route::get('/download-qr/{id}', [AdminController::class, 'downloadQr'])->name('downloadQr');

    // GENERATE ALL QR CODE
    Route::get('/generate-all-qr-pdf', [AdminController::class, 'generateAllQrPdf'])->name('generateAllQrPdf');
});

Route::get('/borrow_books/{id}', [HomeController::class,'borrow_books']);
Route::get('/book_history', [HomeController::class,'book_history']);
Route::get('/book_details/{id}', [HomeController::class,'book_details']);
Route::get('/cancel_req/{id}', [HomeController::class,'cancel_req']);
Route::get('/explore', [HomeController::class,'explore']);
Route::get('/search', [HomeController::class,'search']);
Route::get('/cat_search/{id}', [HomeController::class,'cat_search']);
