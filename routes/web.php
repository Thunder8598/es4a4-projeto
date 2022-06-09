<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("/",function(){
    return redirect("/comente-sobre");
});

Route::get("/comente-sobre",function(){
    return view("index");
});

Route::get("/topicos/{permalink}", [TopicoController::class, "index"]);
Route::post("/topicos", [TopicoController::class, "criar"]);
Route::get("/topicos", [TopicoController::class, "recuperar"]);
Route::get("/comente-sobre/{permalink}", [TopicoController::class, "visualizar"]);