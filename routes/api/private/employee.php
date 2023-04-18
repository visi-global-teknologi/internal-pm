<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'employees', 'as' => 'api.private.employee.', 'middleware' => ['permission.private.api.middleware']], function () {
    Route::post('/', function (Request $request) {
        return app('app.action.api.private.employee.store')->handle($request);
    })->name('store');
    Route::put('/{id}', function (Request $request, $id) {
        return app('app.action.api.private.employee.update')->handle($request, $id);
    })->name('update');
    Route::delete('/{id}', function (Request $request, $id) {
        return app('app.action.api.private.employee.delete')->handle($request, $id);
    })->name('delete');
});
