<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
                'nome',
                'descricao',
                'valor',
                'data_inscricao_inicio',
                'data_inscricao_termino',
                'inscricao_limite',
                'arquivo',
    ];

    public static function lista($paginate)
    {    
 
            $aluno_lista = DB::table('cursos')                             
                         ->select('cursos.id','cursos.nome',
                         'cursos.valor','cursos.data_inscricao_inicio',
                         'cursos.data_inscricao_termino','cursos.inscricao_limite')      
                         ->orderBy('cursos.nome','ASC')
                         ->paginate($paginate);
                       
        
        return $aluno_lista;
    }
}
