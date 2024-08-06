<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ProfilController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['optional.auth'])->get('/profils', [ProfilController::class, 'index']);

Route::post('/login', [LoginController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/commentaires', [CommentaireController::class, 'store']);
    Route::delete('/commentaires/{id}', [CommentaireController::class, 'destroy']);
    Route::put('/profils/{id}', [ProfilController::class, 'update']);
    Route::delete('/profils/{id}', [ProfilController::class, 'destroy']);

});

Route::any('/forbidden', [LoginController::class, 'me'])->name('forbidden');
