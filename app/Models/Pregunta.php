<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'titulo',
        'examen_id'
    ];

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }
    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }
    //Relacion uno a uno polimorfica
    public function imagens(){
        return $this->morphOne(Imagen::class,'imagenable');
    }
}