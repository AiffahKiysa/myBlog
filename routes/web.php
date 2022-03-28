<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\User;

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

Route::get('/dashboard', function(){
    return view('dashboard');
});

Route::middleware('date')->prefix("/pegawai")->group(function(){
    Route::get("/view", function(){
        return "Pegawai Laravel";
    });
    Route::get("/{id}", function($id){
        return "Pegawai dengan id :" . $id . ".";
    });
});

Route::get('/formulir', [FormController::class, 'input']);
Route::post('/proses', [FormController::class, 'proses']);

Route::get('/article',[ArticleController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/article', [ArticleController::class, 'index']) 
    ->middleware(['auth'])->name('article');


    Route::get('/categories/{category:slug}', function(Category $category){
        return view('article',[
            'title' => "Article By Category : $category->name",
            'articles' => $category->articles,
            'name' => $category->name
        ]);
    });
    
    Route::get('/authors/{author:username}', function(User $author){
        return view('article',[
            'title' => 'Article by Author',
            'name' => $author->name,
            'articles' => $author->articles,
        ]);
    });

Route::get('/article/{article:slug}', [ArticleController::class, 'content']);

Route::get('/confirm-password', function () {
    return view('auth.confirm-password');
})->middleware('auth')->name('password.confirm');

require __DIR__.'/auth.php';