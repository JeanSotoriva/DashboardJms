<?php

use App\Http\Controllers\Api\{
    TimestampController,
    ColaboratorController,
    UserController,
    loginController,
    RegisterController,
};

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group( function () {
    
    Route::get('/auth/me', [loginController::class, 'me']);
    Route::post('/auth/logout', [loginController::class, 'logout']);

    Route::get('/usuario', [UserController::class, 'index']);
    Route::put('/usuario', [UserController::class, 'update']);
    Route::delete('/usuario', [UserController::class, 'delete']);

    Route::get('/colaborador', [ColaboratorController::class, 'index']);
    Route::post('/colaborador', [ColaboratorController::class, 'create']);
    Route::put('/colaborador', [ColaboratorController::class, 'update']);
    Route::delete('/colaborador', [ColaboratorController::class, 'delete']);   

    Route::get('/colaborador/ponto', [TimestampController::class, 'timestamps']); 
    Route::post('/colaborador/ponto', [TimestampController::class, 'register']); 

    // Route::get('/feriado', [HolidayController::class, 'index']);      
});

Route::post('/usuario/login', [loginController::class, 'login']);
Route::post('/usuario', [RegisterController::class, 'register']);


Route::get('/', function () {
    return response()->json(['message' => 'ok']);
});