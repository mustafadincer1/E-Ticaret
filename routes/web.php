<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kategori_Controller;
use App\Http\Controllers\UrunController;
use App\Http\Controllers\SepetController;
use App\Http\Controllers\ÖdemeController;
use App\Http\Controllers\SiparisController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AnasayfaController;
use App\Http\Controllers\Admin\Anasayfa_Controller;
use App\Mail\UserSignIn;
use App\Models\User;
use App\Http\Controllers\CartController;
use App\Http\Middleware\Admin;




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


Route::get('/',[AnasayfaController::class,'index'])->name('anasayfa');


Route::get('/kategori/{slug_kategoriadi}', [Kategori_Controller::class,'index'])-> name('kategori');
Route::get('/ürün/{ürün_adi}', [UrunController::class,'index'])->name('ürün');
Route::post('/ara', [UrunController::class, 'ara'])->name('ürün_ara');
Route::get('/ara', [UrunController::class, 'ara'])->name('ürün_ara');

Route::get('/sepet',[SepetController::class,'index'])->name('sepet');
Route::get('/siparisler',[SiparisController::class,'index'])->name('siparisler');
Route::get('/siparisler/{id}',[SiparisController::class,'show'])->name('siparis');


Route::get('/ödeme',[ÖdemeController::class,'index'])->name('ödeme');
Route::post('/ödemeyap',[ÖdemeController::class,'ödemeyap'])->name('ödemeyap');



Route::group(['prefix' =>'sepet'],function(){
    Route::get('/',[CartController::class,'index'])->name('sepet.index');
    Route::post('/ekle',[CartController::class,'ekle'])->name('sepet.ekle');
    
    Route::delete('/kaldir/{rowid}', [CartController::class,'kaldir'])->name('sepet.kaldir');
    Route::delete('/boşalt', [CartController::class,'boşalt'])->name('sepet.boşalt');
    Route::put('/guncelle/{rowid}', [CartController::class,'guncelle'])->name('sepet.guncelle');
    Route::get('/deneme',[CartController::class,'deneme'])->name('sepet.deneme');
    Route::get('/azalt/{id}',[CartController::class,'azalt'])->name('sepet.azalt');
    Route::get('/arttır/{id}',[CartController::class,'arttır'])->name('sepet.arttır');


});


Route::group(['prefix' =>'kullanıcı'],function(){
    Route::get('/giriş',[UserController::class, 'login_page'])->name('giriş');
    Route::post('/giriş',[UserController::class, 'login'])->name('giriş');
    Route::get('/kaydol',[UserController::class, 'sign_in_page'])->name('kaydol');
    Route::post('/kaydol',[UserController::class, 'sign_in'])->name('kaydol');
    Route::get('/activate/{code}',[UserController::class,'activate'])->name('activate');
    Route::post('/logout',[UserController::class,'logout'])->name('logout');
});

Route::get('/mail',function() {
    $user = \App\Models\User::find(1);
    return new UserSignIn($user);
    // return $user;
});


Route::group(['prefix' =>'admin','namespace' => 'admin'],function(){
    Route::get('/' ,function(){
        return "admin";
    });
    Route::get('/giriş',[AdminController::class, 'login_page'])->name('admin.giriş');

    Route::post('/giriş', [AdminController::class, 'login'])->name('admin.login');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::middleware([Admin::class])->group(function () {
        Route::get('/anasayfa', [Anasayfa_Controller::class,'index'])->name('admin.anasayfa');
        
    });
});