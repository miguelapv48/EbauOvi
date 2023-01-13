<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UsuariosController extends Controller
{
    public function index(){
        $usuarios=User::all();
        return view('admin.users.listar_usuarios',compact('usuarios'));
    }
    public function destroy(User $user){
        $user->delete();
        return back()->with("success",_("¡Usuario eliminado¡"));
    }
}
