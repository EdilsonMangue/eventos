@extends('layouts.main')

@section('content')
    

<div class="container-fluid px-4">

  <div class="row justify-content-center mt-5">
   
            <div class="card-title text-start ">
                <span class="p-3 text-success">Criar Cliente</span>
            </div>
            <div class="card-body">
                <form action="/cliente" method="POST">
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
                            <button type="submit" class="btn btn-primary">Criar Cliente</button>
                        </div>
                      </div>
                </form>
          
    </div>
</div>
    {{-- <div class="row my-5">
            <form action="/tipoevento" method="POST">
                @csrf
                @method('POST')
          <div id="error">
            
          </div>
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
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
              </div>
        </form>
         
        <div class="mt-3">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guadar</button>
        </div>
    </form>
</div> --}}
</div> 


@endsection