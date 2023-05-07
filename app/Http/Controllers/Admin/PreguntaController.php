<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Pregunta;  
use App\Models\Examen;
use App\Models\Respuesta; 
use Illuminate\Support\Facades\Auth;

class PreguntaController extends Controller
{
    public function __contruct(){
            $this->middleware('auth');
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preguntas = Pregunta::all();
        return view("admin.preguntas.index", compact("preguntas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pregunta = new Pregunta;
        $title = __("Crear Pregunta");
        $textButton = __("Crear");
        $route = route("admin.preguntas.store");
        $examenes = Examen::all();
        $respuestas = [];
        return view("admin.preguntas.create",compact("title","textButton","route","pregunta","examenes","respuestas"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //Request recoge los datos del formulario
    {
        $this->validate($request, [
            "titulo" => "required|max:140",
            "examen_id" => "required"
        ]);
       $pregunta=Pregunta::create($request->only("titulo","examen_id"));

       $pregunta->respuestas()->create(['respuesta' =>$request->respuesta1, 'correcta' =>$request->correcta1]);
       $pregunta->respuestas()->create(['respuesta' =>$request->respuesta2, 'correcta' =>$request->correcta2]);
       $pregunta->respuestas()->create(['respuesta' =>$request->respuesta3, 'correcta' =>$request->correcta3]);
       $pregunta->respuestas()->create(['respuesta' =>$request->respuesta4, 'correcta' =>$request->correcta4]);

       $pregunta->save();

        return redirect(route("admin.preguntas.index"))
        ->with("success",__("¡Pregunta creada!"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pregunta $pregunta)
    {
        $update = true;
        $title = __("Editar Pregunta");
        $textButton = __("Actualizar Pregunta");
        $examenes=Examen::all();
        $respuestas=Respuesta::where('pregunta_id','=', $pregunta->id)->get();
        //dd($respuestas);
        $route = route("admin.preguntas.update",["pregunta" => $pregunta]);
        return view("admin.preguntas.edit", compact("update","title","textButton","route","pregunta","examenes","respuestas"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pregunta $pregunta)
    {
        $this->validate($request, [
            "titulo" => "required",
            "id_test" => "required"
        ]);
        $pregunta->fill($request->only("titulo"))->save();

        $pregunta->respuestas()->delete();

        $pregunta->respuestas()->create(['respuesta' =>$request->respuesta1, 'correcta' =>$request->correcta1]);
        $pregunta->respuestas()->create(['respuesta' =>$request->respuesta2, 'correcta' =>$request->correcta2]);
        $pregunta->respuestas()->create(['respuesta' =>$request->respuesta3, 'correcta' =>$request->correcta3]);
        $pregunta->respuestas()->create(['respuesta' =>$request->respuesta4, 'correcta' =>$request->correcta4]);

        $pregunta->save();

        return back()->with("success",__("¡Pregunta actualizada!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pregunta $pregunta)
    {
        $pregunta->delete();
        return back()->with("success",__("¡Pregunta eliminada!"));
    }
}