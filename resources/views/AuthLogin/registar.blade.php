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

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                  </li>
                 
                  <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                  </li>
                 
                </ul>
              </div>
            </div>
          </nav>
          


          <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-6 col-md-8 col-sm-8 mt-5">
                    <div class="card shadow">
                        <div class="card-title text-start ">
                            <span class="p-3 text-success">CRIAR CONTA</span>
                        </div>
                        <div class="card-body">
                            <form action="/client-registar" method="POST">
                                @csrf
                                @method('POST')
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Nome</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                  </div>

                                  <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                      <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                  </div>

                                  <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                      <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                  </div>

                                  <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Confirm Password</label>
                                    <div class="col-sm-9">
                                      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                    </div>
                                  </div>

                                  <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label"> </label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary">Criar Conta</button>
                                    </div>
                                  </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


         
    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</html>