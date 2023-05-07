<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'respuesta',
        'correcta',
        'id_pregunta'
    ];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class);
    }
}
;