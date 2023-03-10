<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Preguntas;  
use App\Models\Tesst;
use Illuminate\Support\Facades\Auth;

class PreguntasController extends Controller
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
        return view("admin.preguntas.index", compact("preguntas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pregunta = new Preguntas;
        $title = __("Crear Preguntas");
        $textButton = __("Crear");
        $route = route("admin.preguntas.store");
        $tessts = Tesst::all();
        return view("admin.preguntas.create",compact("title","textButton","route","pregunta","tessts"));
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
            "pregunta" => "required|max:140",
            "id_test" => "required"
        ]);
       Preguntas::create($request->only("pregunta","id_test"));

        return redirect(route("admin.preguntas.index"))
        ->with("success",__("┬íPregunta creada!"));
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
    public function edit(Preguntas $pregunta)
    {
        $update = true;
        $title = __("Editar Pregunta");
        $textButton = __("Actualizar Pregunta");
        $tessts=Tesst::all();
        $route = route("admin.preguntas.update",["pregunta" => $pregunta]);
        return view("admin.preguntas.edit", compact("update","title","textButton","route","pregunta","tessts"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Preguntas $pregunta)
    {
        $this->validate($request, [
            "pregunta" => "required|unique",
            "id_test" => "required"
        ]);
        $pregunta->fill($request->only("pregunta"))->save();
        return back()->with("success",__("┬íPregunta actualizada!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preguntas $pregunta)
    {
        $pregunta->delete();
        return back()->with("success",__("┬íPregunta eliminada!"));
    }
}
