<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

      
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <style>
        .n{
            max-height: 100vh;
        }
    </style>
    </head>
    <body style="background: #ccc;">

        <div id="page-content-wrapper" class="border-bottom">
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-4 px-4 border-bottom">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a href="" class="nav-link">{{Auth::user()->permission}}</a>
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>{{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                {{-- <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li> --}}
                                <li>
                                  <form action="/auth-logout" method="post">
                                    @csrf
                                  <a class="dropdown-item" href="/auth-logout"
                                    onclick="event.preventDefault();
                this.closest('form').submit();"
                                  >
                                    
                                    Logout</a></li>

                                </form>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="d-flex mt-5">
                <div id="sidebar-wrapper" class="bg-white mx-5" style="width: 280px;   max-height: 80vh;">
                
                    <div class="list-group list-group-flush my-3">
                        <!-- Dashboard -->
                        <a href="/dashboard-cliente" class="list-group-item list-group-item-action second-text">
                            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                        </a>
                        
                        {{-- <a href="/cliente" class="list-group-item list-group-item-action second-text">
                            <i class="fas fa-tachometer-alt me-2"></i>Cliente
                        </a> --}}
                        <!-- Cadastros -->
                        {{-- <div class="mb-1">
                            <a class="list-group-item list-group-item-action  rounded collapsed bg-transparent "
                                    data-bs-toggle="collapse" data-bs-target="#submenuCadastros" aria-expanded="false">
                                <i class="fas fa-folder me-2"></i>Cadastros
                        </a>
                            <div class="collapse" id="submenuCadastros">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                  <li><hr class="dropdown-divider"></li>
                                    <li><a href="/funcionario" class="link-dark text-decoration-none ps-4 d-block">Funcionário</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a href="/fornecedor" class="link-dark text-decoration-none ps-4 d-block">Fornecedor</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a href="/financiador" class="link-dark text-decoration-none ps-4 d-block">Financiador</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a href="/marca" class="link-dark text-decoration-none ps-4 d-block">Marca</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a href="/categoria" class="link-dark text-decoration-none ps-4 d-block">Categoria</a></li>
                                </ul>
                            </div>
                        </div> --}}
                
                        <!-- Patrimônio -->
                        <div class="mb-1">
                            <button class="list-group-item list-group-item-action rounded collapsed  "
                                    data-bs-toggle="collapse" data-bs-target="#submenuPatrimonio" aria-expanded="false">
                                <i class="fas fa-box me-2"></i>Eventos
                            </button>
                            <div class="collapse" id="submenuPatrimonio">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                  <li><hr class="dropdown-divider"></li>
                                    {{-- <li><a href="/evento" class="link-dark text-decoration-none ps-4 d-block">Evento</a></li> --}}
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a href="/reserva-cliente" class="link-dark text-decoration-none ps-4 d-block">Reserva</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a href="/cliente-servicos" class="link-dark text-decoration-none ps-4 d-block">Serviço</a></li>
                                    {{-- <li><hr class="dropdown-divider"></li>
                                    <li><a href="/pacote" class="link-dark text-decoration-none ps-4 d-block">Pacote</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a href="/tipoevento" class="link-dark text-decoration-none ps-4 d-block">Tipo de Evento</a></li> --}}
                                </ul>
                            </div>
                        </div>
                
                        <!-- Utilizador -->
                        {{-- <div class="mb-1">
                            <button class="list-group-item list-group-item-action rounded collapsed"
                                    data-bs-toggle="collapse" data-bs-target="#submenuUtilizador" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>Utilizador
                            </button>
                            <div class="collapse" id="submenuUtilizador">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                  <li><hr class="dropdown-divider"></li>
                                    <li><a href="/funcionario" class="link-dark text-decoration-none ps-4 d-block">Funcionario</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a href="/users" class="link-dark text-decoration-none ps-4 d-block">Utilizador</a></li>
                                    
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>
          
                <div class="div mx-2 bg-white w-100">
                    @yield('content')
                </div>
            </div>
            
          
        </div>
    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.js"></script>
    @yield('script')
</html>
