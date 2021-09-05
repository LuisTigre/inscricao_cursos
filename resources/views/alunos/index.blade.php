@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <!-- <li class="breadcrumb-item"><a href="{{route('propostas.index')}}">Propostas</a></li> -->
                          <li class="breadcrumb-item active" aria-current="page">{{ __('Alunos') }}</li>
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
                                            'Endereco',
                                            'Email',
                                            'Telefone',
                                            'Cpf',
                                            'Foto',
                                            ]"

                            v-bind:itens="{{json_encode($alunos)}}"
                                tamanho="12"
                            ordem="desc" ordemcol="3"
                            criar="#criar" editar="/alunos/" deletar="/alunos/" token="{{csrf_token()}}"
                            modal="sim" 
                            
                            ></tabela-lista>
                            
                            <modal nome="adicionar" titulo="Adicionar Aluno">
                                <formulario id="formAdicionar" css="" action="{{route('alunos.store')}}" method="post" enctype="multipart/form-data" token="{{csrf_token()}}">
                                
                                <div class="col-md-4">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome"  required>
                                    <div class="invalid-feedback">
                                        Preenche um nome válido.
                                    </div>
                                </div>                                
                                <div class="col-md-7">
                                    <label for="endereco" class="form-label">Endereço</label>
                                    <input type="text" class="form-control" id="endereco" name="endereco"  required>
                                    <div class="invalid-feedback">
                                        Preenche um endereço válido.
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
                                    <label for="cpf" class="form-label">CPF</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf"  required>
                                    <div class="invalid-feedback">
                                    Digite o CPF correctamente.
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label for="foto" class="form-label">Fotografia</label>
                                    <input type="file" class="form-control" id="foto" name="foto" required>
                                    <div class="invalid-feedback">
                                    carregue uma foto.
                                    </div>                 
                                </div>                 
                                    
                                </formulario>
                                <span slot="botoes">
                                    <button form="formAdicionar" class="btn btn-info">Adicionar</button>
                                </span>

                            </modal>

                            <modal nome="editar" titulo="Editar Alunos">
                                <formulario id="formEditar" v-bind:action="'/alunos/' + $store.state.item.id" method="put" enctype="multipart/form-data" token="{{csrf_token()}}">

                                <div class="col-md-4">
                                    <label for="nome" class="form-label">Nome</label>
                                        <input type="text" class="form-control" id="nome2" v-model="$store.state.item.nome"  name="nome"  required>
                                        <div class="invalid-feedback">
                                        Preenche um nome válido.
                                        </div>
                                    </div>                                
                                    <div class="col-md-7">
                                        <label for="endereco" class="form-label">Endereço</label>
                                        <input type="text" class="form-control" id="endereco2" v-model="$store.state.item.endereco"  name="endereco"  required>
                                        <div class="invalid-feedback">
                                        Preenche um endereço válido.
                                    </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="email" class="form-label">Email</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="text" class="form-control" aria-describedby="inputGroupPrepend"  aria-describedby="inputGroupPrepend" id="email2" v-model="$store.state.item.email"  name="email"  required>
                                            <div class="invalid-feedback">
                                                Digite um email válido.
                                            </div>
                                        </div>
                                    </div>                       
                                    <div class="col-md-3">
                                        <label for="telefone" class="form-label">telefone</label>
                                        <input type="text" class="form-control" id="telefone2" v-model="$store.state.item.telefone"  name="telefone"  required>
                                        <div class="invalid-feedback">
                                            Digite um número de telefone válido.
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="cpf" class="form-label">CPF</label>
                                        <input type="text" class="form-control" id="cpf2" v-model="$store.state.item.cpf"  name="cpf"  required>
                                        <div class="invalid-feedback">
                                        Digite o CPF correctamente.
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-5">
                                            <label for="foto" class="form-label">Fotografia</label>
                                            <input type="file" class="form-control" id="foto2" v-model="$store.state.item.foto" name="foto" required>
                                            <div class="invalid-feedback">
                                                carregue uma foto.
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
