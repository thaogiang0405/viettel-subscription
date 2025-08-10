<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserPackageController;
use App\Http\Controllers\GoiCuocController;
Route::get('/', function () {
    return view('login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/adminIndex', [LoginController::class, 'admin_dashboard'])->name('admin.dashboard');
    Route::get('/userIndex', [LoginController::class, 'dashboard'])->name('auth.dashboard');
});

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');

Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

Route::get('/packages', [PackageController::class, 'filter'])->name('packages.filter');

Route::get('/history', [UserPackageController::class, 'showHistory'])->name('history');

Route::post('/packages/register/{id}', [PackageController::class, 'registerPackage'])->name('packages.register');

Route::put('/packages/cancel/{id}', [PackageController::class, 'cancel'])->name('packages.cancel');

Route::get('/cau-hoi-thuong-gap', [LoginController::class, 'question'])->name('question');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/goi/{id}', [GoiCuocController::class, 'show'])->name('goi.show');

Route::post('/register/{id}', [GoiCuocController::class, 'registerPackage'])->middleware('auth')->name('register.package');

Route::get('/onlydata', [GoiCuocController::class, 'goiChiData'])->name('onlydata');

Route::get('/combo', [GoiCuocController::class, 'goiCombo'])->name('combo');

Route::get('/goi-tra-sau', [GoiCuocController::class, 'goiTraSau'])->name('traSau');

Route::get('/chon-so/{id}', [GoiCuocController::class, 'chonSo'])->name('chonSo');

Route::post('/dang-ky', [GoiCuocController::class, 'dangKy'])->name('dang-ky');

Route::get('/tim-goi', [GoiCuocController::class, 'timGoi'])->name('tim-goi');

Route::get('/goi_cuoc', [GoiCuocController::class, 'listGoiCuoc'])->name('list_goi_cuoc');

Route::get('/them_goi_cuoc', [GoiCuocController::class, 'view_add'])->name('view_add');

Route::post('/them-goi-cuoc', [GoiCuocController::class, 'addGoiCuoc'])->name('add_goi_cuoc');

Route::post('/xoa_goi_cuoc/{id}', [GoiCuocController::class, 'delete_goi_cuoc'])->name('xoa_goi_cuoc');

Route::get('/goi-cuoc/{id}/edit', [GoiCuocController::class, 'edit'])->name('edit_goi_cuoc');

Route::get('/ds_tra_truoc', [GoiCuocController::class, 'list_tra_truoc'])->name('ds_tra_truoc');


Route::post('/dang-ky-tra-truoc/update-sim-note/{id}', [GoiCuocController::class, 'updateSimNote'])
    ->name('dangky.updateSimNote');

Route::put('/update_goi_cuoc/{id}', [GoiCuocController::class, 'update_goi_cuoc'])->name('update_goi_cuoc');

Route::get('ds_tra_sau', [GoiCuocController::class, 'list_tra_sau'])->name('ds_tra_sau');

Route::get('/xuat-file', [GoiCuocController::class, 'xuat_file'])->name('xuat_file');
Route::get('/goi-tra-truoc', [GoiCuocController::class, 'goiTraTruoc'])->name('traTruoc');
Route::get('/otp', [RegisterController::class, 'showOtpForm'])->name('otp.form');
Route::post('/otp', [RegisterController::class, 'verifyOtp'])->name('otp.verify');
Route::post('/otp/resend', [RegisterController::class, 'resendOtp'])->name('otp.resend');
Route::view('/about', 'auth.about')->name('about');

