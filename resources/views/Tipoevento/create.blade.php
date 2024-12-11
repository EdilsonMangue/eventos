@extends('layouts.main')

@section('content')
    

<div class="container-fluid px-4">
    <div class="row my-5">
            <form action="/tipoevento" method="POST">
                @csrf
                @method('POST')
          <div id="error">
            
          </div>
          <label for="sucursal"class="form-label">Nome <span class="text-danger">*</span></label>
          <input type="text" name="name" id="name" class="form-control form-control-sm">
         
        <div class="mt-3">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guadar</button>
        </div>
    </form>
</div>
</div> 


@endsection