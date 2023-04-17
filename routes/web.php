<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});
Auth::routes(['register' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('user-profile', [App\Http\Controllers\UserProfileController::class, 'profile'])->name('user-profile');
Route::get('profile/{id}', [App\Http\Controllers\UserProfileController::class, 'edit'])->name('user-profile.edit');
Route::group(['prefix' => 'acl', 'as' => 'acl.', 'middleware' => ['auth', 'permission.middleware']], function () {
    Route::resource('roles', \App\Http\Controllers\Acl\RoleController::class);
    Route::group(['prefix' => 'roles', 'as' => 'roles.', 'middleware' => []], function () {
        Route::get('/{role}/permissions', [App\Http\Controllers\Acl\RoleController::class, 'permissions'])->name('permissions');
    });
});
Route::group(['prefix' => 'master-data', 'as' => 'master-data.', 'middleware' => ['auth', 'permission.middleware']], function () {
    Route::group(['prefix' => 'employee', 'as' => 'employee.', 'middleware' => []], function () {
        Route::resource('divisions', \App\Http\Controllers\MasterData\DivisionController::class);
        Route::resource('levels', \App\Http\Controllers\MasterData\LevelController::class);
    });
});
Route::resource('employees', \App\Http\Controllers\EmployeeController::class)->middleware(['auth', 'permission.middleware']);
Route::resource('user-activities', \App\Http\Controllers\UserActivityController::class)->middleware(['auth', 'permission.middleware']);
