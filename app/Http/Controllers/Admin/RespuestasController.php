<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Respuestas; 
use App\Models\Preguntas; 
use Illuminate\Support\Facades\Auth;

class RespuestasController extends Controller
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
        $preguntas = Preguntas::all();
        $respuestas = Respuestas::all();
        return view("admin.respuestas.index", compact("respuestas","preguntas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $respuesta = new Respuestas;
        $title = __("Crear Respuestas");
        $preguntas = Preguntas::all();
        $textButton = __("Crear");
        $route = route("admin.respuestas.store");
        return view("admin.respuestas.create",compact("title","textButton","route","respuesta","preguntas"));
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
            "respuesta" => "required|max:140",
        ]);
       Respuestas::create($request->only("id_pregunta","respuesta","correcta"));

        return redirect(route("admin.respuestas.index"))
        ->with("success",__("¡Respuesta creada!"));
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
    public function edit(Respuestas $respuesta)
    {
        $update = true;
        $title = __("Editar Respuesta");
        $textButton = __("Actualizar Respuesta");
        $route = route("admin.respuestas.update", ["respuesta" => $respuesta]);
        return view("admin.respuestas.edit", compact("update","title","textButton","route","respuesta"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Respuestas $respuesta)
    {
        $this->validate($request, [
            "respuesta" => "required|unique:respuestas,respuesta," . $respuesta->id,
        ]);
        $respuesta->fill($request->only("respuesta"))->save();
        return back()->with("success",__("¡Respuesta actualizada!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Respuestas $respuesta)
    {
        $respuesta->delete();
        return back()->with("success",__("¡Respuesta eliminada!"));
    }
}