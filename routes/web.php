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
    Route::get('edit-profile/{id}', [Auth::class, 'editProfile'])->name('edit.profile');
    Route::post('update-profile/{id}', [Auth::class, 'updateProfile'])->name('update.profile');
    Route::post('update-photo/{id}', [Auth::class, 'updatePhoto'])->name('update.photo');
    Route::post('change-password', [Auth::class, 'changePassword'])->name('password.change');
    Route::get('lead', [Lead::class, 'index'])->name('lead.index');
    Route::post('create-lead', [Lead::class, 'create'])->name('create.lead');
    Route::get('show-leads', [Lead::class, 'show'])->name('show.leads');
    Route::get('edit-lead/{id}', [Lead::class, 'edit'])->name('edit.lead');
    Route::post('update-lead/{id}', [Lead::class, 'update'])->name('update.lead');
    Route::get('delete-lead/{id}', [Lead::class, 'delete'])->name('delete.lead');
    Route::get('trashed-lead', [Lead::class, 'trashed'])->name('show.trashed.lead');
    Route::get('restore-lead/{id}', [Lead::class, 'restore'])->name('restore.lead');
    Route::post('/leads/{lead}/accept', [Lead::class, 'accept'])->name('leads.accept');
    Route::post('/leads/{lead}/decline', [Lead::class, 'decline'])->name('leads.decline');
    Route::get('show-assigner/{id}', [Lead::class, 'showAssigner'])->name('show.assigner');

});
