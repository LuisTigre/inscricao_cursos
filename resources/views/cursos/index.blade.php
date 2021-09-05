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
                          <li class="breadcrumb-item active" aria-current="page">{{ __('Cursos') }}</li>
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
                                            'Valor',
                                            'Data Início',
                                            'Data Término',
                                            'Inscrição Limite',
                                            ]"

                            v-bind:itens="{{json_encode($cursos)}}"
                                tamanho="12"
                            ordem="desc" ordemcol="3"
                            criar="#criar" editar="/cursos/" detalhe="/cursos/" deletar="/cursos/" token="{{csrf_token()}}"
                            modal="sim" 
                            
                            ></tabela-lista>
                            <modal nome="adicionar" titulo="Adicionar Curso">
                                <formulario id="formAdicionar" css="" action="{{route('cursos.store')}}" method="post" enctype="multipart/form-data" token="{{csrf_token()}}">
                                
                                <div class="col-md-9">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome"  required>
                                    <div class="invalid-feedback">
                                        Preenche um nome.
                                    </div>
                                </div>                              
                                
                                <div class="col-md-3">
                                    <label for="valor" class="form-label">Valor</label>
                                    <input type="text" class="form-control" id="valor" name="valor"  required>
                                    <div class="invalid-feedback">
                                        Preenche um endereço válido.
                                    </div>
                                </div>                 
                                
                                <div class="col-md-3">
                                    <label for="data_inscricao_inicio" class="form-label">Inscrição Data Início</label>
                                    <input type="date" class="form-control" id="data_inscricao_inicio" name="data_inscricao_inicio"  required>
                                    <div class="invalid-feedback">
                                    Selecione a data Inical.
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="data_inscricao_termino" class="form-label">Inscrição Data Final</label>
                                    <input type="date" class="form-control" id="data_inscricao_termino" name="data_inscricao_termino"  required>
                                    <div class="invalid-feedback">
                                    Selecione a data Final.
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label for="inscricao_limite" class="form-label">Inscrição Limite</label>
                                    <input type="text" class="form-control" id="inscricao_limite" name="inscricao_limite"  required>
                                    <div class="invalid-feedback">
                                    Digite o limite.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="arquivo" class="form-label">Arquivo</label>
                                    <input type="file" class="form-control" id="arquivo" name="arquivo" required>
                                    <div class="invalid-feedback">
                                    carregue um arquivo.
                                    </div>                 
                                </div>                 
                                <div class="col-md-8">
                                    <label for="descricao" class="form-label">Descrição</label>
                                    <textarea class="form-control" cols="3" rows="3" id="descricao" name="descricao"  required></textarea>
                                    <!-- <input type="text" class="form-control" id="descricao" name="descricao"  required> -->
                                    <div class="invalid-feedback">
                                        Preenche um decrição.
                                    </div>
                                </div>    
                                </formulario>
                                <span slot="botoes">
                                    <button form="formAdicionar" class="btn btn-info">Adicionar</button>
                                </span>

                            </modal>

                            <modal nome="editar" titulo="Editar cursos">
                                <formulario id="formEditar" v-bind:action="'/cursos/' + $store.state.item.id" method="put" enctype="multipart/form-data" token="{{csrf_token()}}">

                                        <div class="col-md-9">
                                            <label for="nome" class="form-label">Nome</label>
                                            <input type="text" class="form-control" id="nome2" v-model="$store.state.item.nome"  name="nome"  required>
                                            <div class="invalid-feedback">
                                                Preenche um nome.
                                            </div>
                                        </div>                              
                                    
                                        <div class="col-md-3">
                                            <label for="valor" class="form-label">Valor</label>
                                            <input type="text" class="form-control" id="valor2" v-model="$store.state.item.valor"  name="valor"  required>
                                            <div class="invalid-feedback">
                                                Preenche um endereço válido.
                                            </div>
                                        </div>                 
                                        
                                        <div class="col-md-3">
                                            <label for="data_inscricao_inicio" class="form-label">Inscrição Data Início</label>
                                            <input type="date" class="form-control" id="data_inscricao_inicio2" v-model="$store.state.item.data_inscricao_inicio"  name="data_inscricao_inicio"  required>
                                            <div class="invalid-feedback">
                                            Selecione a data Inical.
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="data_inscricao_termino" class="form-label">Inscrição Data Final</label>
                                            <input type="date" class="form-control" id="data_inscricao_termino2" v-model="$store.state.item.data_inscricao_termino"  name="data_inscricao_termino"  required>
                                            <div class="invalid-feedback">
                                            Selecione a data Final.
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="inscricao_limite" class="form-label">Inscrição Limite</label>
                                            <input type="text" class="form-control" id="inscricao_limite2" v-model="$store.state.item.inscricao_limite"  name="inscricao_limite"  required>
                                            <div class="invalid-feedback">
                                            Digite o limite.
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <label for="descricao" class="form-label">Descrição</label>
                                            <textarea class="form-control" cols="3" rows="3" id="descricao2" v-model="$store.state.item.descricao"  name="descricao"  required>                                                                                                
                                            </textarea>
                                            <!-- <input type="text" class="form-control" id="descricao" name="descricao"  required> -->
                                            <div class="invalid-feedback">
                                                Preenche um decrição.
                                            </div>
                                        </div>    
                                        <!-- <div class="col-md-4">
                                            <label for="arquivo" class="form-label">Arquivo</label>
                                            <input type="file" class="form-control" id="arquivo" name="arquivo" required>
                                            <div class="invalid-feedback">
                                            carregue um arquivo.
                                            </div>                 
                                        </div>                  -->
                                    </formulario>
                                    <span slot="botoes">
                                    <button form="formEditar" class="btn btn-info">Atualizar</button>
                                </span>    
                            </modal> 
                            
                            
                            <modal nome="detalhe" v-bind:titulo="$store.state.item.descricao">                                
                                                                                
                                        <div class="col-md-8">
                                            <label for="descricao" class="form-label">Descrição</label>
                                            <textarea class="form-control" cols="3" rows="3" id="descricao2" v-model="$store.state.item.descricao"  name="descricao"  required>                                                                                                
                                            </textarea>
                                            <!-- <input type="text" class="form-control" id="descricao" name="descricao"  required> -->
                                            <div class="invalid-feedback">
                                                Preenche um decrição.
                                            </div>
                                        </div>                                
                                    
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
