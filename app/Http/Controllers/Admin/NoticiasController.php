<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Noticias;  
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class NoticiasController extends Controller
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
        $noticias = Noticias::all();
        return view("admin.noticias.index", compact("noticias"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $noticias = new Noticias;
        $title = __("Crear Noticias");
        $textButton = __("Crear");
        $route = route("admin.noticias.store");
        return view("admin.noticias.create",compact("title","textButton","route","noticias"));
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
            "descripcion" => "nullable|string|min:10",
        ]);
        Noticias::create($request->only("titulo","descripcion"));

        return redirect(route("admin.noticias.index"))
        ->with("success",__("¡Noticia creada!"));
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
    public function edit(Noticias $noticia)
    {
        $update = true;
        $title = __("Editar Noticias");
        $textButton = __("Actualizar Noticias");
        $route = route("admin.noticias.update", ["noticias" => $noticia]);
        return view("admin.noticias.edit", compact("update","title","textButton","route","noticias"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticias $noticia)
    {
        $this->validate($request, [
            "titulo" => "required|unique:noticias,titulo," . $noticia->id,
            "descripcion" => "nullable|string|min:10"
        ]);
        $noticias->fill($request->only("titulo", "descripcion"))->save();
        return back()->with("success",__("¡Noticia actualizada!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticias)
    {
        $noticias->delete();
        return back()->with("success",__("¡Noticia eliminada!"));
    }
}
