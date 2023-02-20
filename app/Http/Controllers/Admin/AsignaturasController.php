<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asignaturas;  
use Illuminate\Support\Facades\Auth;
class AsignaturasController extends Controller
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
        $asignaturas = Asignaturas::all();
        return view("admin.asignaturas.index",compact('asignaturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asignatura = new Asignaturas;
        $title = __("Crear Asignaturas");
        $textButton = __("Crear Asignaturas");
        $route = route("admin.asignaturas.store");
        return view("admin.asignaturas.create",compact("title","textButton","route","asignatura"));
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
        ]);
        Asignaturas::create($request->only("nombre"));

        return redirect(route("admin.asignaturas.index"))
        ->with("success",__("¡Asignatura  creada"));
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
    public function edit(Asignaturas $asignatura)
    {
        $update = true;
        $title = __("Editar Asignaturas");
        $textButton = __("Actualizar Asignaturas");
        $route = route("admin.asignaturas.update", ["asignatura" => $asignatura]);
        return view("admin.asignaturas.edit", compact("update","title","textButton","route","asignatura"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignaturas $asignatura)
    {
        $this->validate($request, [
            "nombre" => "required|unique:asignaturas"
        ]);
        $asignatura->fill($request->only("nombre"))->save();
        return redirect(route("admin.asignaturas.index"))
            ->with("success",__("¡Asignatura actualizada!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignaturas $asignatura)
    {
        $asignatura->delete();
        return back()->with("success",__("Asignatura eliminada!"));
    }
}

