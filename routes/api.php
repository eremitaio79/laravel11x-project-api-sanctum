<?php

use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/status', function () {
    return response()->json([
        'status' => 'ok',
        'message' => 'API is working fine'
    ],
    200
);
});

/** Rotas de clients. */
Route::apiResource('clients', ClientController::class);

/** Rotas de clients. */
// Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
// Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
// Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');
// Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
// Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
