<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topico extends Model
{
    public function setTitulo(string $titulo)
    {
        $this->titulo = $titulo;

        $this->setPermalink($titulo);
    }

    public function setPermalink(string $titulo)
    {
        $titulo = preg_replace("/\s+/", "-", $titulo);
        $titulo = strtolower($titulo);

        $this->permalink = utf8_encode($titulo);
    }

    public static function listarTopicos(int $pagina = 1, string $busca = null)
    {
        if (!empty($busca)) {
            return parent::where("titulo", "like", "%{$busca}%")
                ->offset($pagina > 0 ? ($pagina * 10) : 10)
                ->simplePaginate(10);
        }

        return parent::offset($pagina > 0 ? ($pagina * 10) : 10)
            ->simplePaginate(10);
    }
}
