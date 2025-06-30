<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/send-data', function (Request $request) {
    return response()->json([
        'message' => 'Laravel received: ' . $request->input('prompt')
    ]);
});
