<?php

use App\Http\Controllers\AdminCategoryController;
use App\Models\category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardArticleController;
use GuzzleHttp\Middleware;

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
    return view('home',[
        "title"=>"Home",
        'active'=> 'home'
    ]);
});
Route::get('/about', function () {
    return view('about',[
        "title"=>"About",
        'active'=> 'about',
    ]);
});



Route::get('/articles', [ArticleController::class, 'index']);

Route::get('articles/{article:slug}', [ArticleController::class,'show']);

Route::get('/categories', function(){
    return view('categories',
    [
        'title'=> 'Article Category',
        'active'=> 'categories',
        'categories'=> category::all()
    ]);
});

Route::get('/signin', [SigninController::class, 'index'])->name('login')->middleware('guest');
Route::post('/signin', [SigninController::class, 'authenticate']);
Route::post('/signout', [SigninController::class, 'signout']);
Route::get('/signup', [SignupController::class, 'index'])->middleware('guest');
Route::post('/signup', [SignupController::class, 'store']);
Route::get('/dashboard', function(){
    return view('dashboard.index');
    })->middleware('auth');
Route::get('/dashboard/articles/checkSlug',[DashboardArticleController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/articles', DashboardArticleController::class)->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

// Route::get('/categories/{category:slug}',function(Category $category){
//     return view('articles',
//     [
//         'title'=> "Kategori Artikel : $category->name",
//         'active'=> 'categories',
//         'articles'=> $category->articles->load('category','author')
//     ]);
// });
// Route::get('/authors/{author:username}',function(User $author){
//     return view('articles',
//     [
//         'title'=> "Artikel User : $author->name",
//         'active'=>'articles',
//         'articles'=> $author->articles->load('category','author')
//     ]);
// });