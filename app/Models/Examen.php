<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Examen extends Model
{
    use HasFactory;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'asignatura_id'
    ];

    protected $table = "examenes";

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }
    public function preguntas()
    {
        return $this->hasMany(Pregunta::class);
    }
}