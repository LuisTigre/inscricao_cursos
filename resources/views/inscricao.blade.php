@extends('layouts.app')

    @section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif                     
    </div>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <!-- <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a> -->
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            @if (Route::has('login'))
            <div class="container" style="background: white;">
                @auth
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
                        <input type="hidden" name='curso_id' value='{{$curso->id}}'>
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
                            <button form="formAdicionar" class="btn btn-info">Increver</button>
                        </span>
                @endauth
            </div>
            @endif
        </div>
    </body>
</html>
@endsection