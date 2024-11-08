<?php

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

Route::get('/', [\App\Http\Controllers\LoginController::class, 'index'])->middleware('guest');
Route::get('/login',[\App\Http\Controllers\LoginController::class,'index'])->middleware('guest');
Route::get('/home', [\App\Http\Controllers\LoginController::class,'index'])->middleware('guest')->name('home');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'userLogin'])->middleware('guest')->name('login');
Route::get('/forgot-password', [\App\Http\Controllers\LoginController::class, 'forgotPassword'])->middleware('guest')->name('forgot-password');
Route::post('/password-recover',[\App\Http\Controllers\LoginController::class, 'recoverPassword'])->middleware('guest')->name('password-recover');
//valida o link do usuario e encaminha o na pagina para cadastrar senha
Route::get('/password_register/{token}',[\App\Http\Controllers\UserController::class, 'tokenValid'])->middleware('guest')->name('password_register');
Route::post('/update-password', [\App\Http\Controllers\UserController::class, 'updateUserPassword'])->middleware('guest')->name('update-password');
//link de acesso expirado ou já utilizado
Route::get('/expired-link',function (){return view('link.expired-link');})->middleware('guest')->name('expired-link');


Route::group(['middleware' => 'auth'], function ()
{
    /** Após login redireciona o usuario para a pagina que mostra as noticias */
    Route::get('/news-list',[\App\Http\Controllers\NewsController::class, 'index'])->middleware(['auth'])->name('news-list');

    /**rota para logout de usuario */
    Route::get('logout', [\App\Http\Controllers\LoginController::class, 'userLogout'])->name('logout');

    /*Rota para criar usuarios  acesso somente como admin*/
    Route::get('/register-user',[\App\Http\Controllers\UserController::class, 'registerIndex'])->middleware(['auth'])->name('register-user');
    //Rota para cadastrar novo usuario, a partir da tela de cadastros
    Route::post('/register', [\App\Http\Controllers\UserController::class, 'registerNewUser'])->middleware(['auth'])->name('register');

    //noticias
    Route::get('/register-news',[\App\Http\Controllers\NewsController::class, 'registerIndex'])->middleware(['auth'])->name('register-news');
    Route::post('/add-news',[\App\Http\Controllers\NewsController::class, 'addNews'])->middleware(['auth'])->name('add-news');

});



