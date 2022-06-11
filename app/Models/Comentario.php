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

    public static function listarTopicos(int $pagina = 1)
    {
        return parent::orderBy("id", "desc")->offset($pagina > 0 ? ($pagina * 10) : 10)
            ->simplePaginate(10);
    }
}
