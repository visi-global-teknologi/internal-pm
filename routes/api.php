<?php

use Illuminate\Support\Facades\Route;

// private
Route::prefix('private')->group(__DIR__.'/api/private/user.php');
Route::prefix('private')->group(__DIR__.'/api/private/employee.php');
Route::prefix('private')->group(__DIR__.'/api/private/datatable.php');
Route::prefix('private')->group(__DIR__.'/api/private/acl.php');
Route::prefix('private')->group(__DIR__.'/api/private/master-data.php');
