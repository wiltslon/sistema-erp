<?php
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ClienteController;
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


Route::apiResource('/empresa',EmpresaController::class);

Route::apiResource('/cliente',ClienteController::class);


Route::get('/', function(){
    return response()->json([
        'success' => true
    ]);
});
