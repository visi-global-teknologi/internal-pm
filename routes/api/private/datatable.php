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
    Route::group(['prefix' => 'master-data', 'as' => 'master-data.', 'middleware' => []], function () {
        Route::group(['prefix' => 'employee', 'as' => 'employee.', 'middleware' => []], function () {
            Route::get('division', function (Request $request) {
                return app('app.action.api.private.datatable.master-data.employee.division')->handle($request);
            })->name('division');
            Route::get('level', function (Request $request) {
                return app('app.action.api.private.datatable.master-data.employee.level')->handle($request);
            })->name('level');
        });
    });
    Route::get('employee', function (Request $request) {
        return app('app.action.api.private.datatable.employee')->handle($request);
    })->name('employee');
    Route::get('user-activity', function (Request $request) {
        return app('app.action.api.private.datatable.user-activity')->handle($request);
    })->name('user-activity');
});
