<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Tesst;  
use App\Models\Asignaturas;
use Illuminate\Support\Facades\Auth;

class TesstController extends Controller
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
        $tesst = Tesst::all();
        return view("admin.tesst.index",compact('tesst'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tesst = new Tesst;
        $title = __("Crear Test");
        $textButton = __("Crear");
        $route = route("admin.tesst.store");
        $asignaturas = Asignaturas::all();
        return view("admin.tesst.create",compact("title","textButton","route","tesst","asignaturas"));
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
            "id_asignatura" => "required"
        ]);
        Tesst::create($request->only("nombre","id_asignatura"));

        return redirect(route("admin.tesst.index"))
        ->with("success",__("¡Test creado"));
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
    public function edit(Tesst $tesst)
    {
        $update = true;
        $title = __("Editar Tesst");
        $textButton = __("Actualizar Test");
        $route = route("admin.tesst.update", ["tesst" => $tesst]);
        $asignaturas=Asignaturas::all();
        return view("admin.tesst.edit", compact("update","title","textButton","route","tesst","asignaturas"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tesst $tesst)
    {
        $this->validate($request, [
            "nombre" => "required",
        ]);
        $preguntas->fill($request->only("tesst"))->save();
        return back()->with("success",__("¡Test actualizado!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tesst $tesst)
    {
        $tesst->delete();
        return back()->with("success",__("Test eliminado!"));
    }
}
