@extends('layouts.main')

@section('content')
    

<div class="container-fluid px-4">
    <div class="row my-5">
            <form action="/servico/{{$servico->id}}/update" method="POST">
                @csrf
                @method('PUT')
          <div id="error">
            
          </div>
          <label for="sucursal"class="form-label">Nome <span class="text-danger">*</span></label>
          <input type="text" value="{{$servico->name}}" name="name" id="name" class="form-control form-control-sm">

          <label for="sucursal"class="form-label">Preco <span class="text-danger">*</span></label>
          <input type="number" value="{{$servico->preco}}"  name="preco" id="preco" class="form-control form-control-sm">

          {{-- <label for="sucursal"class="form-label">Nome <span class="text-danger">*</span></label>
         <select name="pacote" id="pacote" class="form-select form-select-sm" >
            <option value=""></option>
            @foreach($pacotes as $pacote)
              @if($pacote->id == $servico->pacote_id)
            <option value="{{$pacote->id}}" selected>{{$pacote->name}}</option>
            @else
            <option value="{{$pacote->id}}" >{{$pacote->name}}</option>
            @endif
            @endforeach
         </select> --}}
         
        <div class="mt-3">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guadar</button>
        </div>
    </form>
</div>
</div> 


@endsection