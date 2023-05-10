<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Examen;

class ExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $examen = Examen::with(['preguntas', 'preguntas.respuestas'])->find($id);
        return view('examenes.show', compact('examen'));
    }

}