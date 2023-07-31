<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Route;


//Rutas de Usuario

Route::post('user/login',[LoginController::class,'authenticate'] );

Route::get('user/index', [UserController::class,'index']);

Route::post('user/create',[UserController::class,'create'] );

Route::post('user/show',[UserController::class,'show'] );

Route::put('user/update',[UserController::class,'update']);

Route::delete('user/delete',[UserController::class,'delete']);

//Rutas de Tareas

Route::controller(TareaController::class)->group(function(){
    Route::get('/tareas','index');
    Route::post('/tarea','create');
    Route::get('/tarea/{id}','show');
    Route::put('/tarea/{id}','update');
    Route::delete('/tarea/{id}','delete');
});