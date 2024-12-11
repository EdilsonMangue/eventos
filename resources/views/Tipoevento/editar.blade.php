@extends('layouts.main')

@section('content')
    

<div class="container-fluid px-4">
    <div class="row my-5">
            <form action="/tipoevento/{{$tipo->id}}/update" method="POST">
                @csrf
                @method('PUT')
          <div id="error">
            
          </div>
          <label for="sucursal"class="form-label">Nome <span class="text-danger">*</span></label>
          <input type="text" value="{{$tipo->name}}" name="name" id="name" class="form-control form-control-sm">
         
        <div class="mt-3">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guadar</button>
        </div>
    </form>
</div>
</div> 


@endsection