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
        :root{
    --main-bg: rgba(20, 122, 98, 0.904);
}

.main-bg{
    background-color: var(--main-bg) !important;
}

input:focus,
button:focus{
    border:  1px solid var(--main-bg) !important;
    box-shadow: none !important;
}

.form-check-input:checked{
    background-color: var(--main-bg) !important;
    border-color: var(--main-bg) !important;
}

form,input, button{
    border-radius: 0 !important;
}
    </style>
    </head>
    <body style="background-color: #ccc;">

        {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <!-- Logo à esquerda -->
              <a class="navbar-brand" href="#"><img src="/assets/logo.png" alt="" srcset=""></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <!-- Links à direita -->
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown link
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
           --}}


          <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-5 col-md-8 col-sm-8 mt-5">
                    <div class="card shadow">
                        <div class="card-title text-center ">
                            <span class="p-3 text-success">INICIAR SESSÃO</span>
                        </div>
                        <div class="card-body">
                            <form action="authlogin" method="POST">
                                @csrf
                                @method('POST')
                                <div class="mb-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control form-control-sm" name="email" id="email">
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control form-control-sm" name="password" id="password">
                                </div>
                                <div class="mb-4">
                                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                    <label for="remember" class="form-label">Remember Me</label>
                                </div>
    
                                <div class="d-grid">
                                    <button type="submit" class="btn main-bg text-white fw-bold">Iniciar Sessão</button>
                                </div>
                            </form>
                        </div>

                        <div class="card-footer  text-end text-success">
                          Esqueceu Senha?
                        </div>
                    </div>
                </div>
            </div>
        </div>


         
    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</html>