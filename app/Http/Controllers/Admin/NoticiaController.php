<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Noticia;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class NoticiaController extends Controller
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
        $noticias = Noticia::all();
        return view("admin.noticias.index", compact("noticias"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $noticia = new Noticia;
        $title = __("Crear Noticia");
        $textButton = __("Crear");
        $route = route("admin.noticias.store");
        return view("admin.noticias.create", compact("title", "textButton", "route", "noticia"));
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
            "descripcion" => "|string|min:10",
        ]);
        Noticia::create($request->only("user_id", "titulo", "descripcion"));


        return redirect(route("admin.noticias.index"))
            ->with("success", __("¡Noticia creada!"));
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
    public function edit(Noticia $noticia)
    {
        $update = true;
        $title = __("Editar Noticia");
        $textButton = __("Actualizar Noticia");
        $route = route("admin.noticias.update", ["noticia" => $noticia]);
        return view("admin.noticias.edit", compact("update", "title", "textButton", "route", "noticia"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticia)
    {
        $this->validate($request, [
            "titulo" => "required|unique:noticias,titulo," . $noticia->id,
            "descripcion" => "nullable|string|min:10"
        ]);
        $noticia->fill($request->only("titulo", "descripcion"))->save();
        return back()->with("success", __("¡Noticia actualizada!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        $noticia->delete();
        return back()->with("success", __("¡Noticia eliminada!"));
    }
}