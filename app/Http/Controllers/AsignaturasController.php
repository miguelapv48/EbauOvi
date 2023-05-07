<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Asignaturas;

class AsignaturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaturas = Asignaturas::all();
        return view('asignaturas', compact('asignaturas'));
    }
}