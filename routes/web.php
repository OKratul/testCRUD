<?php


use App\Http\Controllers\PhonebookController;
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

Route::get('/', function () {

});

Route::group(['middleware'=>'authCheck','prefix'=>'list'],function (){
    Route::get('/',[PhonebookController::class,'index'])->name('contactList');

    Route::post('/create',[PhonebookController::class,'create'])->name('createContact');
    Route::get('/{id}/edit',[PhonebookController::class,'showEdit'])->name('showEdit');
    Route::post('/{id}/edit',[PhonebookController::class,'edit'])->name('contactEdit');
    Route::get('/{id}/delete',[PhonebookController::class,'delete'])->name('deleteContact');
});


Route::get('/register',[\App\Http\Controllers\UserController::class,'showRegister'])->name('showRegister');
Route::post('register',[\App\Http\Controllers\UserController::class,'register'])->name('register.save');

Route::get('/',[\App\Http\Controllers\UserAuthController::class,'showLogin'])->name('loginShow');
Route::post('/login',[\App\Http\Controllers\UserAuthController::class,'login'])->name('login');
Route::get('/logout',[\App\Http\Controllers\UserAuthController::class,'logOut'])->name('logout');

Route::get('/verify-email/{email}/{code}',[\App\Http\Controllers\UserController::class,'verifyUser'])->name('verifyEmail');

Route::post('/register',[\App\Http\Controllers\UserController::class,'register'])->name('register');
