<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Services\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::get('/status', function () {
//     return response()->json(
//         [
//             'status' => 'ok',
//             'message' => 'API is working fine'
//         ],
//         200
//     );
// });

Route::get('/status', function () {
    return ApiResponse::success(
        [
            'status' => 'ok',
            // 'message' => 'API is working fine'
        ]
    );
});

/**
 * Rotas de clients geradas de forma automática pelo Laravel.
 * Estas rotas são associadas automaticamente aos respectivos métodos da controller de clients. */
Route::apiResource('clients', ClientController::class);

Route::post('/login', [AuthController::class, 'login'])->name('login');
/** Rotas de clients definidas manualmente. */
// Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
// Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
// Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');
// Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
// Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
