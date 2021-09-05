@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{route('cursos.index')}}">Cursos</a></li>
                          <li class="breadcrumb-item active" aria-current="page">{{ __('Inscrições') }}</li>
                        </ol>
                    </nav>                    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif                     
                </div>
                    
                <div class="table-area">                                            
                        <tabela-lista
                            v-bind:titulos="['#',
                            'Nome',
                            'Categoria',
                            'Curso',
                            'Email',
                            'CPF', 
                            'Empresa', 
                            'Telefone',
                            'Celular'
                          ]"

                            v-bind:itens="{{json_encode($inscricaos)}}"
                                tamanho="12"
                            ordem="desc" ordemcol="3"
                            criar="#criar" editar="/inscricaos/" deletar="/inscricaos/" token="{{csrf_token()}}"
                            modal="sim" 

                            
                            
                            
                            ></tabela-lista>
                            
                            <modal nome="adicionar" titulo="Adicionar Inscrição">
                                <formulario id="formAdicionar" css="" action="{{route('inscricaos.store')}}" method="post" enctype="multipart/form-data" token="{{csrf_token()}}">
                                
                                <div class="col-md-4">
                                    <label for="nome_do_aluno" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="nome_do_aluno" name="nome_do_aluno"  required>
                                    <div class="invalid-feedback">
                                        Preenche um nome válido.
                                    </div>
                                </div> 
                                <div class="col-md-5">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input type="text" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend"  aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Digite um email válido.
                                        </div>
                                    </div>
                                </div>                       
                                <div class="col-md-3">
                                    <label for="telefone" class="form-label">telefone</label>
                                    <input type="text" class="form-control" id="telefone" name="telefone"  required>
                                    <div class="invalid-feedback">
                                        Digite um número de telefone válido.
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="celular" class="form-label">Celular</label>
                                    <input type="text" class="form-control" id="celular" name="celular"  required>
                                    <div class="invalid-feedback">
                                        Digite um número de telefone válido.
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="empresa" class="form-label">Empresa</label>
                                    <input type="text" class="form-control" id="empresa" name="empresa"  required>
                                    <div class="invalid-feedback">
                                        Preenche o campo empresa.
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="cpf" class="form-label">CPF</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf"  required>
                                    <div class="invalid-feedback">
                                    Digite o CPF correctamente.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label for="curso_id" class="form-label">Curso</label>
                                        <select class="form-control" id="curso_id" name="curso_id" required>
                                            @foreach($cursos as $key=>$curso)
                                            <option value="{{$curso->id}}">{{$curso->nome}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Preenche correctamente o curso.!
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <label for="categoria" class="form-label">Categoria</label>
                                        <select class="form-control" id="categoria" name="categoria" required>                                            
                                            <option value="Estudante">Estudante</option>
                                            <option value="Profissional">Profissional</option>
                                            <option value="Associado">Associado</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Preenche correctamente a cliente.!
                                        </div>
                                </div>  
                                <!-- <div class="col-md-3">
                                    <label for="senha" class="form-label">Senha</label>
                                    <input type="password" class="form-control" id="senha" name="senha"  required>
                                    <div class="invalid-feedback">
                                    Digite o password correctamente.
                                    </div>
                                </div>                                             -->
                                <!-- <div class="col-md-3">
                                    <label for="confirmacao_da_senha" class="form-label">Confirma Senha</label>
                                    <input type="password" class="form-control" id="confirmacao_da_senha" name="confirmacao_da_senha"  required>
                                    <div class="invalid-feedback">
                                    Digite o password correctamente.
                                    </div>
                                </div>                                             -->
                                    
                                </formulario>
                                <span slot="botoes">
                                    <button form="formAdicionar" class="btn btn-info">Adicionar</button>
                                </span>

                            </modal>

                            <modal nome="editar" titulo="Editar Incricação">
                                <formulario id="formEditar" v-bind:action="'/inscricaos/' + $store.state.item.id" method="put" enctype="multipart/form-data" token="{{csrf_token()}}">

                                    <div class="col-md-4">
                                        <label for="nome_do_aluno" class="form-label">Nome</label>
                                        <input type="text" class="form-control" id="nome_do_aluno" name="nome_do_aluno"  v-model="$store.state.item.nome_do_aluno"  required>
                                        <div class="invalid-feedback">
                                            Preenche um nome válido.
                                        </div>
                                    </div> 
                                    <div class="col-md-5">
                                        <label for="email" class="form-label">Email</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="text" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend"  aria-describedby="inputGroupPrepend" v-model="$store.state.item.email" aria-describedby="inputGroupPrepend"  aria-describedby="inputGroupPrepend" required>
                                            <div class="invalid-feedback">
                                                Digite um email válido.
                                            </div>
                                        </div>
                                    </div>                       
                                    <div class="col-md-3">
                                        <label for="telefone" class="form-label">telefone</label>
                                        <input type="text" class="form-control" id="telefone" name="telefone"  v-model="$store.state.item.telefone"  required>
                                        <div class="invalid-feedback">
                                            Digite um número de telefone válido.
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="celular" class="form-label">Celular</label>
                                        <input type="text" class="form-control" id="celular" name="celular"  v-model="$store.state.item.celular"  required>
                                        <div class="invalid-feedback">
                                            Digite um número de telefone válido.
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="empresa" class="form-label">Empresa</label>
                                        <input type="text" class="form-control" id="empresa" name="empresa"  v-model="$store.state.item.empresa"  required>
                                        <div class="invalid-feedback">
                                            Preenche o campo empresa.
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="cpf" class="form-label">CPF</label>
                                        <input type="text" class="form-control" id="cpf" name="cpf"  v-model="$store.state.item.cpf"  required>
                                        <div class="invalid-feedback">
                                        Digite o CPF correctamente.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <label for="curso_id" class="form-label">Curso</label>
                                            <select class="form-control" id="curso_id" name="curso_id" v-model="$store.state.item.curso_id" required>
                                                @foreach($cursos as $key=>$curso)
                                                <option value="{{$curso->id}}">{{$curso->nome}}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Preenche correctamente o curso.!
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                            <label for="categoria" class="form-label">Categoria</label>
                                            <select class="form-control" id="categoria" name="categoria" required>                                   v-model="$store.state.item.categoria" required>                                            
                                                <option value="Estudante">Estudante</option>
                                                <option value="Profissional">Profissional</option>
                                                <option value="Associado">Associado</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Preenche correctamente a cliente.!
                                            </div>
                                    </div>  
                                    <!-- <div class="col-md-3">
                                        <label for="senha" class="form-label">Senha</label>
                                        <input type="password" class="form-control" id="senha" name="senha"  v-model="$store.state.item.senha"  required>
                                        <div class="invalid-feedback">
                                        Digite o password correctamente.
                                        </div>
                                    </div>                                            
                                    <div class="col-md-3">
                                        <label for="confirmacao_da_senha" class="form-label">Confirma Senha</label>
                                        <input type="password" class="form-control" id="confirmacao_da_senha" name="confirmacao_da_senha"  v-model="$store.state.item.confirmacao_da_senha"  required>
                                        <div class="invalid-feedback">
                                        Digite o password correctamente.
                                        </div>
                                    </div>           -->
                                        </formulario>
                                        <span slot="botoes">
                                        <button form="formEditar" class="btn btn-info">Atualizar</button>
                                    </span>    
                            </modal>                               
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
