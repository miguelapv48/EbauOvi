<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Asignatura;
use Illuminate\Http\Request;
use App\Models\Pregunta;
use App\Models\Examen;
use App\Models\Respuesta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PreguntaController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Asignatura $asignatura, Examen $examen, Request $request) //Request recoge los datos del formulario
    {
        $pregunta = Pregunta::create([
            "titulo" => '',
            "examen_id" => $examen->id
        ]);

        for ($i = 0; $i < 4; $i++) {
            $pregunta->respuestas()->create(['respuesta' => '', 'correcta' => false]);
        }

        

        if($request->file('imagen')){
            $imagen=Storage::put('preguntas',$request->file('imagen'));
            $pregunta->imagens()->create(['direccion'=>$imagen]);
        }

        $pregunta->save();

        return redirect(route("admin.examenes.edit", ["asignatura" => $asignatura, "examen" => $examen]))
            ->with("success", __("¡Pregunta creada!"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Asignatura $asignatura, Examen $examen, Pregunta $pregunta, Request $request)
    {
        $pregunta->titulo = $request->get('titulo') ?? '';

        $respuestas = $request->get('respuestas');
        $correcta = $request->get('correcta');

        foreach ($pregunta->respuestas as $respuesta) {
            $respuesta->respuesta = $respuestas[$respuesta->id] ?? '';
            $respuesta->correcta = $respuesta->id == $correcta;
            $respuesta->save();
        }

        $pregunta->save();

        if($request->file('imagen')){
            $imagen=Storage::put('preguntas',$request->file('imagen'));
            $pregunta->imagens()->create(['direccion'=>$imagen]);
        }

        return back()->with("success", __("¡Pregunta actualizada!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignatura $asignatura, Examen $examen, Pregunta $pregunta)
    {
        $pregunta->delete();
        return back()->with("success", __("¡Pregunta eliminada!"));
    }
}