<?php

use Illuminate\Support\Facades\Route;

Route::prefix('private')->group(__DIR__.'/api/private/employee.php');
Route::prefix('private')->group(__DIR__.'/api/private/helper.php');
Route::prefix('private')->group(__DIR__.'/api/private/user-profile.php');
Route::prefix('private')->group(__DIR__.'/api/private/acl.php');
Route::prefix('private')->group(__DIR__.'/api/private/master-data.php');
Route::prefix('private')->group(__DIR__.'/api/private/datatable.php');
