<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'helpers', 'as' => 'api.private.helper.', 'middleware' => []], function () {
    Route::group(['prefix' => 'dropdown', 'as' => 'dropdown.', 'middleware' => []], function () {
        Route::get('employee-position-by-division/{employeeDivisionId}', function (Request $request, $employeeDivisionId) {
            return app('app.action.api.private.helper.dropdown.employee-position-by-division')->handle($request, $employeeDivisionId);
        })->name('employee-position-by-division');
    });
    Route::group(['prefix' => 'selecttwo', 'as' => 'selecttwo.', 'middleware' => []], function () {
        Route::get('user', function (Request $request) {
            return app('app.action.api.private.helper.selecttwo.user')->handle($request);
        })->name('user');
        Route::get('country-without-indonesia', function (Request $request) {
            return app('app.action.api.private.helper.selecttwo.country-without-indonesia')->handle($request);
        })->name('country-without-indonesia');
        Route::get('province', function (Request $request) {
            return app('app.action.api.private.helper.selecttwo.province')->handle($request);
        })->name('province');
        Route::get('city-by-province/{provinceCode}', function (Request $request, $provinceCode) {
            return app('app.action.api.private.helper.selecttwo.city-by-province')->handle($request, $provinceCode);
        })->name('city-by-province');
        Route::get('district-by-city/{cityCode}', function (Request $request, $cityCode) {
            return app('app.action.api.private.helper.selecttwo.district-by-city')->handle($request, $cityCode);
        })->name('district-by-city');
        Route::get('village-by-district/{districtCode}', function (Request $request, $districtCode) {
            return app('app.action.api.private.helper.selecttwo.village-by-district')->handle($request, $districtCode);
        })->name('village-by-district');
    });
});
