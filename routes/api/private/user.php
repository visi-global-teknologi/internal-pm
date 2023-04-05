<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users', 'as' => 'api.private.users.', 'middleware' => []], function () {
    Route::post('change-password', function (Request $request) {
        return app('app.action.api.private.user.change-password')->handle($request);
    })->name('change-password');
});
