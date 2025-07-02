<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::post('/send-data', function (Request $request) {
    return response()->json([
        'message' => 'Laravel received: ' . $request->input('prompt')
    ]);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:sanctum', 'role:admin'])->get('/admin/data', function () {
    return response()->json(['message' => 'Welcome Admin']);
});

Route::middleware(['auth:sanctum', 'role:manager,admin'])->get('/manager/tasks', function () {
    return response()->json(['message' => 'Manager Access Granted']);
});

Route::middleware(['auth:sanctum', 'role:agent'])->get('/agent/leads', function () {
    return response()->json(['message' => 'Agent View']);
});

