<?php

use App\Http\Controllers\bookController;
use App\Http\Controllers\borrowController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\reviewController;
use App\Http\Controllers\sesiController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('books.books', [
//         "active" => "home",
//     ]);
// })->middleware('auth');

Route::get('/', [bookController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('books/{book:slug}', [bookController::class, 'show']);


Route::get('/categories', function() {
    return view('categori.categories', [
        'tittle' => 'Post Categories',
        "active" => "categories",
        'categories' => Category::all(),
    ]);
})->middleware('auth');

Route::get('/categories/{category:slug}', function(Category $category) {
    return view('books.books', [
        'tittle' => "Post by Category : $category->name",
        "active" => "categories",
        'books' => $category->books->load('category', 'author'),
    ]);
}) ->middleware('auth');

// Route::get('/authors/{author:username}', function(User $author) {
//     return view('books.books', [
//         'tittle' => "Post By Author : $author->name",
//         "active" => "categories",
//         'books' => $author->books->load('category', 'author'),
//     ]);
// });


Route::post('/store', [bookController::class, 'store']);
Route::get('/create', [bookController::class, 'create']);
Route::get('/add', [bookController::class, 'add']);
Route::get('/view/{book:slug}', [bookController::class, 'view']);
Route::get('/edit/{book:slug}', [bookController::class, 'edit']);
Route::put('/update/{slug}', [bookController::class, 'update']);
Route::delete('/hapus/{slug}', [bookController::class, 'destroy']);

// Route::resource('/peminjaman', borrowController::class);
Route::get('borrows', [borrowController::class, 'index']);
Route::post('borrows', [borrowController::class, 'store']);
Route::post('reviews', [reviewController::class, 'store']);
// Route::middleware('auth')->get('/user-id', function () {
//     return view('user_id');
// });


Route::get('/login', [sesiController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [sesiController::class, 'authenticate']);
Route::post('/logout', [sesiController::class, 'logout']);

Route::get('/register', [sesiController::class, 'create'])->middleware('guest');
Route::post('/register', [sesiController::class, 'store']);








