<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user-profile', 'as' => 'api.private.user-profile.', 'middleware' => ['permission.private.api.middleware']], function () {
    Route::put('/{id}', function (Request $request, $id) {
        return app('app.action.api.private.user-profile.update')->handle($request, $id);
    })->name('update');
    Route::post('change-password', function (Request $request) {
        return app('app.action.api.private.user-profile.change-password')->handle($request);
    })->name('change-password');
});
