<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicoPostRequest;
use App\Models\Topico;
use Exception;
use PDOException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TopicoController extends Controller
{

    public function index(Request $request, string $permalink = null)
    {
        try {
            $response = Topico::topicoPorPermalink($permalink);

            if (empty($response))
                return response(view("not-found"), 404);

            return view("topico", ["topico" => $response]);
        } catch (Exception $e) {
            Log::error("TopicoController::visualizar - Erro na requisição", ["erro" => $e]);

            return abort(500, "Oops! Tente mais tarde.");
        }
    }
    
    public function criar(TopicoPostRequest $resquest)
    {
        try {
            $topico = new Topico();

            $topico->setTitulo($resquest->input("topico"));

            $response = Topico::topicoPorPermalink($topico->permalink);

            if (empty($response))
                $topico->save();

            return redirect("/comente-sobre/{$topico->permalink}");
        } catch (Exception $e) {
            Log::error("TopicoController::criar - Erro na requisição", ["erro" => $e]);

            return response(view("exception"), 500);
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
}
