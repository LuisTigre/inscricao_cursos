<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Aluno;

class AlunosController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $alunos = Aluno::lista(1000);

        return view('alunos.index', compact("alunos"));
    }
    public function show($id)
    {
        $aluno = Aluno::find($id);
        return $aluno;
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Aluno::create($data);

        return redirect()->back()->with('status','Aluno Inserido com sucesso');
        // dd($data);

    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $aluno = Aluno::find($id);
        $aluno->update($data);

        return redirect()->back()->with('status','Aluno Inserido com sucesso');
        // dd($data);

    }

}
