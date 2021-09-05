@extends('layouts.app')

    @section('content')
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
            <div class="container">
                <div class="flex-container" style="display:flex; flex-wrap: wrap; justify-content: space-between;">
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 18rem;">                    
                            <img class="card-img-top" width='10px' src="https://www.unialfa.com.br/arqsfck/images/it-specialist-checking-code-at-computer-in-the-dark-office-at-night.jpg" alt="Card image cap">
                            
                            <div class="card-body">
                                <h5 class="card-title">Engenharia de Software</h5>
                                <p class="card-text">6000 R$</p>
                                <a href="{{ route('cursos.inscricao',1) }}" class="btn btn-primary" style="width:100%; font-size: 1rem; font-weight:bold;">Inscrever</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 18rem;">                    
                            <img class="card-img-top" width='10px' src="https://www.unialfa.com.br/arqsfck/images/it-specialist-checking-code-at-computer-in-the-dark-office-at-night.jpg" alt="Card image cap">
                            
                            <div class="card-body">
                                <h5 class="card-title">Engenharia de Software</h5>
                                <p class="card-text">6000 R$</p>
                                <a href="{{ route('cursos.inscricao',1) }}" class="btn btn-primary" style="width:100%; font-size: 1rem; font-weight:bold;">Inscrever</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 18rem;">                    
                            <img class="card-img-top" width='10px' src="https://www.unialfa.com.br/arqsfck/images/it-specialist-checking-code-at-computer-in-the-dark-office-at-night.jpg" alt="Card image cap">
                            
                            <div class="card-body">
                                <h5 class="card-title">Engenharia de Software</h5>
                                <p class="card-text">6000 R$</p>
                                <a href="{{ route('cursos.inscricao',1) }}" class="btn btn-primary" style="width:100%; font-size: 1rem; font-weight:bold;">Inscrever</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 18rem;">                    
                            <img class="card-img-top" width='10px' src="https://www.unialfa.com.br/arqsfck/images/it-specialist-checking-code-at-computer-in-the-dark-office-at-night.jpg" alt="Card image cap">
                            
                            <div class="card-body">
                                <h5 class="card-title">Engenharia de Software</h5>
                                <p class="card-text">6000 R$</p>
                                <a href="{{ route('cursos.inscricao',1) }}" class="btn btn-primary" style="width:100%; font-size: 1rem; font-weight:bold;">Inscrever</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 18rem;">                    
                            <img class="card-img-top" width='10px' src="https://www.unialfa.com.br/arqsfck/images/it-specialist-checking-code-at-computer-in-the-dark-office-at-night.jpg" alt="Card image cap">
                            
                            <div class="card-body">
                                <h5 class="card-title">Engenharia de Software</h5>
                                <p class="card-text">6000 R$</p>
                                <a href="{{ route('cursos.inscricao',1) }}" class="btn btn-primary" style="width:100%; font-size: 1rem; font-weight:bold;">Inscrever</a>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 18rem;">                    
                            <img class="card-img-top" width='10px' src="https://www.unialfa.com.br/arqsfck/images/it-specialist-checking-code-at-computer-in-the-dark-office-at-night.jpg" alt="Card image cap">
                            
                            <div class="card-body">
                                <h5 class="card-title">Engenharia de Software</h5>
                                <p class="card-text">6000 R$</p>
                                <a href="{{ route('cursos.inscricao',1) }}" class="btn btn-primary" style="width:100%; font-size: 1rem; font-weight:bold;">Inscrever</a>
                            </div>
                        </div>
                    </div>
    
                </div>

            </div>
        </div>
    </body>
</html>
@endsection