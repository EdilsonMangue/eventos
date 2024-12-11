@extends('layouts.main')

@section('content')
    

<div class="container-fluid px-4">
    <div class="row my-5">
            <form action="/evento/{{$evento->id}}/update" method="POST">
                @csrf
                @method('PUT')
          <div id="error">
            
          </div>
          <div class="row">
           <div class="col-md-12">
          <label for="sucursal"class="form-label">Nome <span class="text-danger">*</span></label>
          <input type="text" value="{{$evento->name}}" name="name" id="name" class="form-control form-control-sm">
        </div> 
        <div class="col-md-12">
          <label for="sucursal"class="form-label">Tipo de Evento <span class="text-danger">*</span></label>
          <select name="tipo_evento" id="tipo_evento" class="form-select form-select-sm">
            <option value=""></option>
            @foreach($tipos as $tipo)
            <option value="{{$tipo->id}}" {{$evento->tipo_evento_id == $tipo->id ? "selected" : ""}}>{{$tipo->name}}</option>
            @endforeach
        </select>
        </div>

        <div class="col-md-12">
            <label for="sucursal"class="form-label">Local de Evento <span class="text-danger">*</span></label>
            <input type="text" value="{{$evento->local_evento}}" name="local" id="local" class="form-control form-control-sm">
          </div> 
        <div class="col-md-6">
            <label for="sucursal"class="form-label">Data Inicio <span class="text-danger">*</span></label>
            <input type="date" value="{{$evento->data_inicio}}" name="data_inicio" id="data_inicio" class="form-control form-control-sm">
        </div>
        <div class="col-md-6">
            <label for="sucursal"class="form-label">Data Fim <span class="text-danger">*</span></label>
            <input type="date" value="{{$evento->data_fim}}" name="data_fim" id="data_fim" class="form-control form-control-sm">
        </div>

        <div class="col-md-6">
            <label for="sucursal"class="form-label">Hora Inicio <span class="text-danger">*</span></label>
            <input type="time" value="{{$evento->hora_inicio}}" name="hora_inicio" id="data_inicio" class="form-control form-control-sm">
        </div>
        <div class="col-md-6">
            <label for="sucursal"class="form-label">Hora Fim <span class="text-danger">*</span></label>
            <input type="time" value="{{$evento->hora_fim}}" name="hora_fim" id="data_fim" class="form-control form-control-sm">
        </div>
       

     
         
        <div class="mt-3">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guadar</button>
        </div>
    </div>
    </form>
</div>
</div> 


@endsection