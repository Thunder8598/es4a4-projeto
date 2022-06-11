<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Topico;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\ComentarioPostRequest;
use Illuminate\Support\Facades\Log;

class ComentarioController extends Controller
{
    public function criar(ComentarioPostRequest $request)
    {
        try {
            $topico = Topico::topicoPorPermalink($request->input("permalink"));

            $comentario = new Comentario([
                "email" => $request->input("email"),
                "comentario" => $request->input("comentario"),
                "topico" => $topico->id
            ]);

            $comentario->save();

            return response()->json($comentario);
        } catch (Exception $e) {
            Log::error("ComentarioController::criar - Erro na requisição", ["erro" => $e]);

            return response(view("exception"), 500);
        }
    }

    public function recuperar(Request $resquest)
    {
        $pagina = (int) $resquest->get("page");

        $pagina = $pagina <= 0 ? 1 : $pagina;

        try {
            $response = Comentario::listarTopicos($pagina);

            if (!count($response->getCollection())) {
                return response()->json([
                    "status" => "erro",
                    "mensagem" => "Nenhum tópico encontrado"
                ], 404);
            }

            return response()->json([
                "status" => "sucesso",
                "resposta" => $response
            ]);
        } catch (Exception $e) {
            Log::error("ComentarioController::recuperar - Erro na requisição", ["erro" => $e]);

            return response()->json([
                "status" => "erro"
            ], 500);
        }
    }
}
