<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Asignatura;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaturas = Asignatura::all();
        return view('asignaturas.index', compact('asignaturas'));
    }
    public function show(int $id)
    {
        $asignatura = Asignatura::with('examenes')->find($id);
        return view('asignaturas.show', compact('asignatura'));
    }
}