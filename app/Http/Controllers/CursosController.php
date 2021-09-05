<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Support\Facades\Route;

class CursosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $cursos = Curso::lista(1000);

        return view('cursos.index', compact("cursos"));
    }
    public function show($id)
    {
        $curso = Curso::find($id);
        return $curso;
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Curso::create($data);

        return redirect()->back()->with('status','Aluno Inserido com sucesso');
        // dd($data);

    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $curso = Curso::find($id);
        $curso->update($data);

        return redirect()->back()->with('status','Aluno Inserido com sucesso');
        // dd($data);

    }

    public function inscricao(Request $request, $id){
        $curso = Curso::find($id);

        return view('inscricao', compact("curso"));             
       
    }
}
