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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Asignatura $asignatura)
    {
        $examen = new Examen();
        $title = __("Crear Test");
        $textButton = __("Crear");
        $route = route("admin.examenes.store", ["asignatura" => $asignatura]);
        return view("admin.examenes.create", compact("title", "textButton", "route", "examen", "asignatura"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Asignatura $asignatura, Request $request) //Request recoge los datos del formulario
    {
        $this->validate($request, [
            "nombre" => "required|max:140"
        ]);

        $examen = Examen::create([
            "nombre" => $request->get("nombre"),
            "asignatura_id" => $asignatura->id
        ]);

        return redirect(route("admin.examenes.edit", ["asignatura" => $asignatura, "examen" => $examen]))
            ->with("success", __("¡Test creado"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignatura $asignatura, Examen $examen)
    {
        $update = true;
        $title = __("Editar Examen");
        $textButton = __("Guardar");
        $route = route("admin.examenes.update", ["asignatura" => $asignatura, "examen" => $examen]);
        return view("admin.examenes.edit", compact("update", "title", "textButton", "route", "examen", "asignatura"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Asignatura $asignatura, Examen $examen, Request $request)
    {
        $this->validate($request, [
            "nombre" => "required",
        ]);

        $examen->nombre = $request->get("nombre");
        $examen->save();

        return back()->with("success", __("¡Test actualizado!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignatura $asignatura, Examen $examen)
    {
        $examen->delete();
        return back()->with("success", __("Test eliminado!"));
    }
}