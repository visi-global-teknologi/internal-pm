<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'datatables', 'as' => 'api.private.datatable.', 'middleware' => []], function() {
    Route::get('role', function (Request $request) {
        return app('app.action.api.private.datatable.role')->handle($request);
    })->name('role');
});
