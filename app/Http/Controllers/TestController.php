<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tesst;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        $tests = Tesst::where('id_asignatura', '=', $id);

        return view('tessts', compact('tests'));
    }

}