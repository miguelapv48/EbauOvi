<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'examen_id'
    ];

    public function respuestas()
    {
        return $this->belongsToMany(Respuesta::class);
    }

    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }

    public function resultado()
    {
        $respuestasCorrectas = [];

        foreach ($this->respuestas as $respuesta) {
            if ($respuesta->correcta) {
                $respuestasCorrectas[] = $respuesta;
            }
        }

        return round(count($respuestasCorrectas) / count($this->examen->respuestasCorrectas()) * 10, 2);
    }
}