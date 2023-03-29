<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// private
Route::prefix('private')->group(__DIR__.'/api/private/user.php');
