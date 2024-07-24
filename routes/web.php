<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController as Auth;
use App\Http\Controllers\LeadController as Lead;

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
Route::get('new-password', [Auth::class, 'newPassword'])->name('new.password');
Route::post('new-password', [Auth::class, 'saveNewPassword'])->name('save.new.password');
// Route::get('verify-token', [Auth::class, 'verifyTokenOnly'])->name('verify.token');
Route::post('verify-token', [Auth::class, 'verifyTokenOnly'])->name('verify.token');
Route::get('registration', [Auth::class, 'Registration']);
Route::post('registration', [Auth::class, 'Registered'])->name('registration');
Route::get('login', [Auth::class, 'Login']);
Route::post('login', [Auth::class, 'LoggedIn'])->name('login');
Route::get('logout', [Auth::class, 'logout'])->name('logout');
Route::get('forgot-password', [Auth::class, 'forgotPassword'])->name('forgot.password');
Route::post('reset-password', [Auth::class, 'generateToken'])->name('reset.password');

Route::middleware(['auth', 'custom'])->group(function(){
    Route::get('admin/dashboard', [Auth::class, 'dashboard'])->name('admin.dashboard');
});
Route::middleware(['auth', 'user'])->group(function(){
    Route::get('user/dashboard', [Auth::class, 'dashboard'])->name('user.dashboard');
});
Route::middleware(['auth', 'staff'])->group(function(){
    Route::get('staff/dashboard', [Auth::class, 'dashboard'])->name('staff.dashboard');
});
Route::middleware(['auth'])->group(function(){
    Route::get('profile', [Auth::class, 'profile'])->name('profile');
    Route::post('change-password', [Auth::class, 'changePassword'])->name('password.change');
    Route::get('lead', [Lead::class, 'index'])->name('lead.index');
    Route::post('create-lead', [Lead::class, 'create'])->name('create.lead');
    Route::get('show-leads', [Lead::class, 'show'])->name('show.leads');
    Route::get('edit-lead/{id}', [Lead::class, 'edit'])->name('edit.lead');
    Route::post('update-lead/{id}', [Lead::class, 'update'])->name('update.lead');
});
