<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\contactusController;

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

// Website Routes
Route::get('/', [WebsiteController::class, 'index'])->name('website.home');
Route::get('/about', [WebsiteController::class, 'about'])->name('website.about');
Route::get('/post', [WebsiteController::class, 'allpost'])->name('website.allpost');
Route::get('/post/{slug}', [WebsiteController::class, 'post'])->name('website.post');
Route::get('/category/{slug}', [WebsiteController::class, 'category'])->name('website.category');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('website.contact');

Route::post('/dashboard/contactus/create', [WebsiteController::class,'contactus_message'])->name('contactus.create');


// Dashboard routes
Route::get('/dashboard',[AdminController::class,'index']);
 Route::resource('/dashboard/user',UserController::class);
 Route::get('/dashboard/profile', [UserController::class,'profile'])->name('user.profile');
 Route::post('/dashboard/profile/update', [UserController::class,'profile_update'])->name('user.profile.update');
 Route::resource('/dashboard/category', CategoryController::class);
 Route::resource('/dashboard/tag', TagController::class);
 Route::resource('/dashboard/tag', TagController::class);
 Route::resource('/dashboard/post', PostController::class);
 //manage
 Route::get('/dashboard/manage', [ManageController::class,'index'])->name('manage.index');
 Route::post('/dashboard/manage/update', [ManageController::class,'update'])->name('manage.update');
 //contactus
 Route::get('/dashboard/contactus', [ContactusController::class,'index'])->name('contactus.index');
 Route::get('/dashboard/contactus/show/{contactus}', [ContactusController::class,'show'])->name('contactus.show');
 Route::delete('/dashboard/contactus/delete/{contactus}', [ContactusController::class,'destroy'])->name('contactus.destroy');

 







Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
