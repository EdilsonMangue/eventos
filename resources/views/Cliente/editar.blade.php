@extends('layouts.main')

@section('content')
    

<div class="container-fluid px-4">

  <div class="row justify-content-center mt-5">
   
            <div class="card-title text-start ">
                <span class="p-3 text-success">Criar Cliente</span>
            </div>
            <div class="card-body">
                <form action="/cliente/{{$cliente->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Nome</label>
                        <div class="col-sm-9">
                          <input type="text" value="{{$cliente->name}}" class="form-control" id="name" name="name">
                        </div>
                      </div>

                      {{-- <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" id="email" name="email">
                        </div>
                      </div> --}}

                      <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Endereço</label>
                        <div class="col-sm-9">
                          <input type="text" value="{{$cliente->endereco}}" class="form-control" id="endereco" name="endereco">
                        </div>
                      </div>

                      <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Telefone</label>
                        <div class="col-sm-9">
                          <input type="text" value="{{$cliente->telephone}}" class="form-control" id="telefone" name="telefone">
                        </div>
                      </div>

                      {{-- <div class="mb-3 row">
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
                      </div> --}}

                      <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-3 col-form-label"> </label>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                      </div>
                </form>
          
    </div>
</div>
   
</div> 


@endsection