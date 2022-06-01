<?php

namespace App\Http\Controllers;

use App\Models\Topico;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TopicoController extends Controller
{
    public function criar(Request $resquest)
    {
        try {
            $topico = new Topico();

            $topico->setTitulo($resquest->get("topico"));
            $topico->save();

            return response()->json($topico);
        } catch (Exception $e) {
            Log::error("TopicoController::criar - Erro na requisição", ["erro" => $e]);

            return redirect("/");
        }
    }

    public function recuperar(Request $resquest,string $permalink)
    {
        try {
            //return Topico::listarTopicos();
        } catch (Exception $e) {
            Log::error("TopicoController::recuperar - Erro na requisição", ["erro" => $e]);

            return abort(500, "Oops, algo deu errado. Tente mais tarde.");
        }
    }
}
