<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::all();
        return view("noticias.index", compact("noticias"));
    }

    public function show(int $id)
    {
        $noticia = Noticia::find($id);
        return view('noticias.show', compact('noticia'));
    }
}