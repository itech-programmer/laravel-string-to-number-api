<?php

use App\Http\Controllers\Api\StringToNumberController;
use Illuminate\Support\Facades\Route;

Route::post('/string/to/number', [StringToNumberController::class, 'convert']);
