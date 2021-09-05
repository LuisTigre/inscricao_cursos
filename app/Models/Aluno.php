<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [        
            'nome',
            'endereco',
            'email',
            'telefone',
            'cpf',
            'foto',
    ];


    public static function lista($paginate)
    {    
 
            $aluno_lista = DB::table('alunos')                             
                         ->select('alunos.id','alunos.nome',
                         'alunos.endereco','alunos.email',
                         'alunos.telefone','alunos.cpf',
                         'alunos.foto')      
                         ->orderBy('alunos.nome','ASC')
                         ->paginate($paginate);
                       
        
        return $aluno_lista;
    }
}
