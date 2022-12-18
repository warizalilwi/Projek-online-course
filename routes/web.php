<?php

use App\Http\Controllers\BidangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KtgrModulController;
use App\Http\Controllers\LembagaController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\UserController;
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

// Route::prefix('home')->group(function () {
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/course', [HomeController::class, 'course'])->name('course');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
Route::get('/about', [HomeController::class, 'about'])->name('about');
// });
Route::name('auth')->group(function () {
    Route::get('/register', [UserController::class, 'GetRegister'])->name('GetRegister');
    Route::post('/createAkun', [UserController::class, 'CreateAkun'])->name('CreateAkun');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/loginAuth', [UserController::class, 'LoginAuth'])->name('LoginAuth');
    Route::get('/logout', [UserController::class, 'Logout'])->name('Logout');
});

//route for user
Route::prefix('instansi')->group(function () {
    Route::get('/', [LembagaController::class, 'GetLembaga'])->name('GetLembaga');
    Route::post('/addLembaga', [LembagaController::class, 'AddLembaga'])->name('AddLembaga');
    Route::post('/updateById', [LembagaController::class, 'UpdateById'])->name('UpdateById');
    Route::get('/deleteById/{id}', [LembagaController::class, 'DeleteById'])->name('DeleteById');
});
Route::get('/dashboard', [DashboardController::class, 'GetAll'])->name('dashboard');
Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'GetAllUser'])->name('GetAllUser');
    Route::post('/updateByIdUser', [UserController::class, 'UpdateByIdUser'])->name('UpdateByIdUser');
    Route::get('/deleteByIdUser/{id}', [UserController::class, 'DeleteByIdUser'])->name('user.DeleteByIdUser');
});

//route for bidang
Route::prefix('bidang')->group(function () {
    Route::get('/', [BidangController::class, 'GetAllBidang'])->name('GetAllBidang');
    Route::post('/addBidang', [BidangController::class, 'AddBidang'])->name('bidang.AddBidang');
    Route::post('/updateByIdBidang', [BidangController::class, 'UpdateByIdBidang'])->name('bidang.UpdateByIdBidang');
    Route::get('/deleteByIdBidang/{id}', [BidangController::class, 'DeleteByIdBidang'])->name('bidang.DeleteByIdBidang');
});

//route for Kelas
Route::prefix('kelas')->group(function () {
    Route::get('/', [KelasController::class, 'GetAllKelas'])->name('GetAllKelas');
    Route::post('/addKelas', [KelasController::class, 'AddKelas'])->name('kelas.AddKelas');
    Route::post('/updateKelasById', [KelasController::class, 'UpdateKelasById'])->name('kelas.UpdateKelasById');
    Route::get('/deleteKelasById/{id}', [KelasController::class, 'DeleteKelasById'])->name('kelas.DeleteKelasById');
});

//route for kategori Modul
Route::prefix('ktgrModul')->group(function () {
    Route::get('/', [KtgrModulController::class, 'GetAllKtgrModul'])->name('GetAllKtgrModul');
    Route::post('/addKtgrModul', [KtgrModulController::class, 'AddKtgrModul'])->name('AddKtgrModul');
    Route::post('/updateByIdKtgrModul', [KtgrModulController::class, 'UpdateByIdKtgrModul'])->name('UpdateByIdKtgrModul');
    Route::get('/deleteByIdKtgrModul/{id}', [KtgrModulController::class, 'DeleteByIdKtgrModul'])->name('DeleteByIdKtgrModul');
});

//route for Member
Route::prefix('member')->group(function () {
    Route::get('/', [MemberController::class, 'GetAllMember'])->name('GetAllMember');
    Route::post('/addMember', [MemberController::class, 'AddMember'])->name('member.AddMember');
    Route::post('/updateMemberById', [MemberController::class, 'UpdateMemberById'])->name('member.UpdateMemberById');
    Route::get('/deleteMemberById/{id}', [MemberController::class, 'DeleteMemberById'])->name('member.DeleteMemberById');
});

//route for Mentor
Route::prefix('mentor')->group(function () {
    Route::get('', [MentorController::class, 'GetAllMentor'])->name('GetAllMentor');
    Route::post('/addMentor', [MentorController::class, 'AddMentor'])->name('mentor.AddMentor');
    Route::post('/updateMentorById', [MentorController::class, 'UpdateMentorById'])->name('mentor.UpdateMentorById');
    Route::get('/deleteMentorById/{id}', [MentorController::class, 'DeleteMentorById'])->name('mentor.DeleteMentorById');
});

//route for Modul
Route::prefix('modul')->group(function () {
    Route::get('', [ModulController::class, 'GetAllModul'])->name('GetAllModul');
    Route::post('/addModul', [ModulController::class, 'AddModul'])->name('modul.AddModul');
    Route::post('/updateModulById', [ModulController::class, 'UpdateModulById'])->name('modul.UpdateModulById');
    Route::get('/deleteModulById/{id}', [ModulController::class, 'DeleteModulById'])->name('modul.DeleteModulById');
});