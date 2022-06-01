<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topico extends Model
{
    //protected $fillable = [];

    public function setTitulo(string $titulo)
    {
        $this->titulo = $titulo;

        $this->setPermalink($titulo);
    }

    public function setPermalink(string $titulo)
    {
        $titulo = preg_replace("/\s+/", "-", $titulo);
        $titulo = strtolower($titulo);

        $this->permalink = $titulo;
    }
}
