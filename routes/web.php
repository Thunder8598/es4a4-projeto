<?php

use App\Http\Controllers\ComentarioController;
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

Route::get("/", function () {
    return redirect("/comente-sobre");
});

Route::get("/comente-sobre", function () {
    return view("index");
});

Route::get("/buscar",function(){
    return view("busca");
});

Route::get("/comente-sobre/{permalink}", [TopicoController::class, "index"]);

Route::post("/topicos", [TopicoController::class, "criar"]);
Route::get("/topicos", [TopicoController::class, "recuperar"]);

Route::post("/comentarios", [ComentarioController::class, "criar"]);
Route::get("/comentarios", [ComentarioController::class, "recuperar"]);
