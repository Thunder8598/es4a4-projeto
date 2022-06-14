<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = [
        "email",
        "comentario",
        "topico"
    ];

    public static function listarTopicos(int $pagina = 1, Topico $topico)
    {
        return parent::where("topico", "=", $topico->id)
            ->orderBy("id", "desc")
            ->offset($pagina > 0 ? ($pagina * 10) : 10)
            ->simplePaginate(10);
    }
}
