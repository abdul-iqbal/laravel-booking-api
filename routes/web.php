<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/api/bookings');
Route::apiResource('api/bookings', BookingController::class)->only(['index', 'store', 'show', 'update']);
