<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'acl', 'as' => 'api.private.acl.', 'middleware' => []], function() {
    Route::group(['prefix' => 'role', 'as' => 'role.', 'middleware' => []], function() {
        Route::delete('/{id}', function (Request $request, $id) {
            return app('app.action.api.private.acl.role.delete')->handle($request, $id);
        })->name('delete');
    });
});
