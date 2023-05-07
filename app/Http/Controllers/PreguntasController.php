<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preguntas;

class PreguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        $preguntas = Preguntas::where('id_test', '=', $id);
        return view('preguntas', compact('preguntas'));
    }
}