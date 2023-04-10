<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'employees', 'as' => 'api.private.employee.', 'middleware' => []], function () {
    Route::put('/{uuid}', function (Request $request, $uuid) {
        return app('app.action.api.private.employee.update')->handle($request, $uuid);
    })->name('update');
    Route::delete('/{id}', function (Request $request, $id) {
        return app('app.action.api.private.employee.update')->handle($request, $id);
    })->name('delete');
    Route::put('/{uuid}/profile', function (Request $request, $uuid) {
        return app('app.action.api.private.employee.update.profile')->handle($request, $uuid);
    })->name('update.profile');
});
