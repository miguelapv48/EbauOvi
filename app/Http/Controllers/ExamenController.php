<?php

namespace App\Http\Controllers;

use App\Models\Entrega;
use Illuminate\Http\Request;

use App\Models\Examen;
use Illuminate\Support\Facades\Auth;

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

    public function entregar(int $id, Request $request)
    {
        $respuestas = array_values($request->get('preguntas') ?? []);
        $entrega = Entrega::where(['user_id' => Auth::user()->id, 'examen_id' => $id])->first();

        if ($entrega == null) {
            $entrega = Entrega::create([
                'user_id' => Auth::user()->id,
                'examen_id' => $id
            ]);
        }

        $entrega->respuestas()->sync($respuestas);

        return redirect(route("resultado_examen", ["id" => $id]));
    }

    public function resultado(int $id)
    {
        $entrega = Entrega::with(['examen', 'respuestas', 'examen.preguntas', 'examen.preguntas.respuestas'])
            ->where(['user_id' => Auth::user()->id, 'examen_id' => $id])->firstOrFail();

        return view('examenes.entrega', compact('entrega'));
    }

}