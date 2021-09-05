<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Inscricao extends Model
{
    use HasFactory;

    protected $fillable = [        
       'nome_do_aluno',
       'email',
       'cpf', 
       'empresa', 
       'telefone',
       'celular',
       'categoria',
       'curso_id',
       'curso_id',
];

public function user()
{
    return $this->morphOne('App\User', 'userable');
}


public static function lista($paginate)
{    

    $aluno_lista = DB::table('inscricaos')                             
                    ->Join('cursos','cursos.id','inscricaos.curso_id')
                    ->select('inscricaos.id','inscricaos.nome_do_aluno',
                    'inscricaos.categoria','cursos.nome as curso',
                    'inscricaos.email','inscricaos.cpf',
                    'inscricaos.empresa','inscricaos.telefone','inscricaos.celular',
                    )      
                    ->orderBy('inscricaos.nome_do_aluno','ASC')
                    ->paginate($paginate);
                   
    
    return $aluno_lista;
}

}
