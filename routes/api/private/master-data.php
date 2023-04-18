<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'master-data', 'as' => 'api.private.master-data.', 'middleware' => ['permission.private.api.middleware']], function () {
    Route::group(['prefix' => 'employee', 'as' => 'employee.', 'middleware' => []], function () {
        Route::group(['prefix' => 'division', 'as' => 'division.', 'middleware' => []], function () {
            Route::post('/', function (Request $request) {
                return app('app.action.api.private.master-data.employee.division.store')->handle($request);
            })->name('store');
            Route::put('/{id}', function (Request $request, $id) {
                return app('app.action.api.private.master-data.employee.division.update')->handle($request, $id);
            })->name('update');
            Route::delete('/{id}', function (Request $request, $id) {
                return app('app.action.api.private.master-data.employee.division.delete')->handle($request, $id);
            })->name('delete');
        });
        Route::group(['prefix' => 'level', 'as' => 'level.', 'middleware' => []], function () {
            Route::post('/', function (Request $request) {
                return app('app.action.api.private.master-data.employee.level.store')->handle($request);
            })->name('store');
            Route::put('/{id}', function (Request $request, $id) {
                return app('app.action.api.private.master-data.employee.level.update')->handle($request, $id);
            })->name('update');
            Route::delete('/{id}', function (Request $request, $id) {
                return app('app.action.api.private.master-data.employee.level.delete')->handle($request, $id);
            })->name('delete');
        });
    });
});
