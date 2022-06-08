<?php

namespace App\Http\Controllers;

use App\Comentario;
use App\Models\Topico;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ComentarioController extends Controller
{
    public function criar(Request $request)
    {
        try {
            $comentario = new Comentario([
                "email"=>$request->input("email"),
                "comentario"=>$request->input("comentario"),
            ]);

            $comentario->save();

            return response()->json($comentario);
        } catch (Exception $e) {
            Log::error("ComentarioController::criar - Erro na requisição", ["erro" => $e]);

            return redirect("/");
        }
    }

    public function recuperar(Request $resquest)
    {
        $busca = $resquest->get("busca");
        $pagina = (int) $resquest->get("page");

        $pagina = $pagina <= 0 ? 1 : $pagina;

        try {
            $response = Topico::listarTopicos($pagina, $busca);

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
            Log::error("TopicoController::recuperar - Erro na requisição", ["erro" => $e]);

            return response()->json([
                "status" => "erro"
            ], 500);
        }
    }

    public function visualizar(Request $request, string $permalink = null)
    {
        try {
            $response = Topico::topicoPorPermalink($permalink);

            if (empty($response)) {
                return response()->json([
                    "status" => "erro",
                    "mensagem" => "Nenhum tópico encontrado"
                ], 404);
            }

            return response()->json($response);
        } catch (Exception $e) {
            Log::error("TopicoController::visualizar - Erro na requisição", ["erro" => $e]);

            return response()->json([
                "status" => "erro"
            ], 500);
        }
    }
}
