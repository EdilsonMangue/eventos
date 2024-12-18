@extends('layouts.main')

@section('content')
    

<div class="container-fluid px-4">
    <div class="row my-5">
            <form action="/funcionario" method="POST">
                @csrf
                @method('POST')
          <div id="error">
            
          </div>
          <label for="sucursal"class="form-label">Nome <span class="text-danger">*</span></label>
          <input type="text" name="name" id="name" class="form-control form-control-sm">
          <label for="email"class="form-label mt-1">Email <span class="text-danger">*</span></label>
          <input type="email" name="email" id="email" class="form-control form-control-sm">
          <label for="nr_bi"class="form-label mt-1">Número de BI <span class="text-danger"></span></label>
          <input type="text" name="nr_bi" id="nr_bi" class="form-control form-control-sm">
          <label for="nr_bi"class="form-label mt-1">Contacto<span class="text-danger"></span></label>
          <input type="text" name="contacto" id="contacto" class="form-control form-control-sm">
          <label for="nr_bi"class="form-label mt-1">Password<span class="text-danger">*</span></label>
          <input type="text" name="password" id="password" class="form-control form-control-sm">
          {{-- <label for="nr_bi"class="form-label mt-1">Nivel de Acesso<span class="text-danger">*</span></label>
          <select name="permissao" id="permissao" class="form-select form-select-sm">
            <option value=""></option>
            <option value="Funcionario">Funcionário</option>
            <option value="Administrador">Administrador</option>
          </select> --}}
        </div>
        <div class>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guadar</button>
        </div>
    </form>
</div>
</div> 


@endsection