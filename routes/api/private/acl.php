<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'acl', 'as' => 'api.private.acl.', 'middleware' => []], function () {
    Route::group(['prefix' => 'role', 'as' => 'role.', 'middleware' => []], function () {
        Route::post('/', function (Request $request) {
            return app('app.action.api.private.acl.role.store')->handle($request);
        })->name('store');
        Route::put('/{id}', function (Request $request, $id) {
            return app('app.action.api.private.acl.role.update')->handle($request, $id);
        })->name('update');
        Route::delete('/{id}', function (Request $request, $id) {
            return app('app.action.api.private.acl.role.delete')->handle($request, $id);
        })->name('delete');
        Route::put('/{id}/permission/{permissionName}/assigned', function (Request $request, $id, $permissionName) {
            return app('app.action.api.private.acl.role.permission.assigned')->handle($request, $id, $permissionName);
        })->name('assigned');
        Route::put('/{id}/permission/{permissionName}/revoke', function (Request $request, $id, $permissionName) {
            return app('app.action.api.private.acl.role.permission.revoke')->handle($request, $id, $permissionName);
        })->name('revoke');
    });
});
