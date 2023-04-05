<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});
Auth::routes(['register' => false]);
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('profile/{uuid}', [App\Http\Controllers\HomeController::class, 'profileEdit'])->name('profile.edit');
Route::group(['prefix' => 'acl', 'as' => 'acl.', 'middleware' => ['auth', 'permission.middleware']], function () {
    Route::resource('roles', \App\Http\Controllers\Acl\RoleController::class);
    Route::group(['prefix' => 'roles', 'as' => 'roles.', 'middleware' => []], function () {
        Route::get('/{role}/permissions', [App\Http\Controllers\Acl\RoleController::class, 'permissions'])->name('permissions');
    });
});
Route::group(['prefix' => 'master-data', 'as' => 'master-data.', 'middleware' => ['auth', 'permission.middleware']], function () {
    Route::resource('employee-divisions', \App\Http\Controllers\MasterData\EmployeeDivisionController::class);
    Route::resource('employee-levels', \App\Http\Controllers\MasterData\EmployeeLevelController::class);
});
