<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Examen;
use App\Models\Asignatura;
use Illuminate\Support\Facades\Auth;

class ExamenController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examen = Examen::all();
        return view("admin.examenes.index", compact('examen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $examen = new Examen;
        $title = __("Crear Test");
        $textButton = __("Crear");
        $route = route("admin.examenes.store");
        $asignaturas = Asignatura::all();
        return view("admin.examenes.create", compact("title", "textButton", "route", "examen", "asignaturas"));
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
            "nombre" => "required|max:140",
            "asignatura_id" => "required"
        ]);
        Examen::create($request->only("nombre", "asignatura_id"));

        return redirect(route("admin.examenes.index"))
            ->with("success", __("¡Test creado"));
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
    public function edit(Examen $examen)
    {
        $update = true;
        $title = __("Editar Examen");
        $textButton = __("Actualizar Test");
        $route = route("admin.examenes.update", ["examen" => $examen]);
        $asignaturas = Asignatura::all();
        return view("admin.examenes.edit", compact("update", "title", "textButton", "route", "examen", "asignaturas"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Examen $examen)
    {
        $this->validate($request, [
            "nombre" => "required",
        ]);
        $preguntas->fill($request->only("examen"))->save();
        return back()->with("success", __("¡Test actualizado!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Examen $examen)
    {
        $examen->delete();
        return back()->with("success", __("Test eliminado!"));
    }
}