<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'datatables', 'as' => 'api.private.datatable.', 'middleware' => []], function () {
    Route::get('role', function (Request $request) {
        return app('app.action.api.private.datatable.role')->handle($request);
    })->name('role');
    Route::get('permission', function (Request $request) {
        return app('app.action.api.private.datatable.permission')->handle($request);
    })->name('permission');
    Route::get('employee-division', function (Request $request) {
        return app('app.action.api.private.datatable.employee-division')->handle($request);
    })->name('employee-division');
    Route::get('employee-level', function (Request $request) {
        return app('app.action.api.private.datatable.employee-level')->handle($request);
    })->name('employee-level');
    Route::get('employee', function (Request $request) {
        return app('app.action.api.private.datatable.employee')->handle($request);
    })->name('employee');
});
