<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscricao;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class InscricaosController extends Controller
{
    public function index()
    {
        $inscricaos = Inscricao::lista(1000);
        $cursos = Curso::all();

        return view('inscricaos.index', compact("inscricaos","cursos"));
    }
    public function show($id)
    {
        $inscricao = Inscricao::find($id);
        return $inscricao;
    }

    public function store(Request $request)
    {          
        $data = $request->all();
        $user = User::find(auth()->id());
        $data['curso_id'] = Curso::all()->first()->id;
        // dd($data['curso_id']);

        
        Inscricao::create($data);        
            
        return redirect()->back()->with('status','Aluno Inserido com sucesso');
        // dd($data);

    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $inscricao = Inscricao::find($id);
        $inscricao->update($data);

        return redirect()->back()->with('status','Aluno Inserido com sucesso');
        // dd($data);

    }
}
