<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\UserManagement\PermissionController;
use App\Http\Controllers\UserManagement\RolesAssignmentController;
use App\Http\Controllers\UserManagement\RolesController;
use App\Http\Controllers\UserManagement\UsersController;
use App\Http\Controllers\WebController;

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

Route::get('/migrate-and-seed', [WebController::class, 'migrateAndSeed'])->name('migrateAndSeed');

Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('/about-us', [WebController::class, 'about'])->name('about');
Route::get('/events', [WebController::class, 'events'])->name('events');
Route::get('/gallery', [WebController::class, 'gallery'])->name('gallery');
Route::get('/contact-us', [WebController::class, 'contact'])->name('contact');
Route::get('/membership', [WebController::class, 'members'])->name('members');
Route::get('/membership-registration', [WebController::class, 'member_registration'])->name('member_registration');
Route::post('/membership-registration', [WebController::class, 'member_registration_store'])->name('member_registration_store');
Route::get('/membership/{id}', [WebController::class, 'member_registration_show'])->name('member_registration_show')->middleware('signed');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::group(['as' => 'users.'], function () {
        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('roles-assignment', RolesAssignmentController::class);
    });
    Route::resource('users', UsersController::class);
    Route::resource('members', MembersController::class);
});
