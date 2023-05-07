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
    public function index(int $id)
    {
        $tests = Examen::where('id_asignatura', '=', $id);

        return view('examenes', compact('tests'));
    }

}