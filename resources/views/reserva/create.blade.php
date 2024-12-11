@extends('layouts.main')

@section('content')
    

<div class="container-fluid px-4">
    <div class="row my-5">
            <form action="/reserva" method="POST">
                @csrf
                @method('POST')
          <div id="error">
            
          </div>
          <label for="sucursal"class="form-label">Cliente <span class="text-danger">*</span></label>
          <select name="cliente" id="cliente" class="form-select form-select-sm">
            <option value=""></option>

            @foreach($clientes as $cliente)
             <option value="{{$cliente->id}}">{{$cliente->name}}</option>
            @endforeach
          </select>
         
          <label for="sucursal"class="form-label">Selecione os servicos <span class="text-danger">*</span></label>
          <br>
          {{-- @foreach($pacotes as $pacote)
          <label for="sucursal"class="form-label ">{{$pacote->name}} <span class="text-danger">*</span></label>
           @foreach($pacote->servicos as $servico)
           <div class="form-check d-flex mt-2">
            <input class="form-check-input" type="checkbox" value="{{ $servico->id }}" id="servico_{{ $servico->id }}" name="servicos[]" >
            <label class="form-check-label px-2" for="servico_{{ $servico->id }}">
                {{$servico->name}} - Preco {{$servico->preco}}
            </label>
            <label for="" class="px-5"> Quantidade</label>
            <input type="number" name="qty[]" class="form-control form-control-sm" style="width: 300px;">
            
          </div>
           @endforeach
          @endforeach --}}

          @foreach($pacotes as $pacote)
    <label for="sucursal" class="form-label">{{$pacote->name}} <span class="text-danger">*</span></label>
    @foreach($pacote->servicos as $servico)
        <div class="form-check d-flex mt-2">
            <!-- Checkbox para o serviço -->
            <input class="form-check-input" type="checkbox" value="{{ $servico->id }}" 
                   id="servico_{{ $servico->id }}" name="servicos[]" 
                   onchange="toggleQtyField(this, 'qty_{{ $servico->id }}')">
            
            <label class="form-check-label px-2" for="servico_{{ $servico->id }}">
                {{ $servico->name }} - Preço {{ $servico->preco }}
            </label>
            
            <!-- Campo de quantidade -->
            <label for="" class="px-5">Quantidade</label>
            <input type="number" name="qty[]" id="qty_{{ $servico->id }}" 
                   class="form-control form-control-sm" style="width: 300px;" 
                   disabled> <!-- Desabilitado inicialmente -->
        </div>
    @endforeach
@endforeach

          
          
        <div class="mt-3">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guadar</button>
        </div>
    </form>
</div>
</div> 


@endsection

@section('script')

<script>
    function toggleQtyField(checkbox, qtyFieldId) {
        const qtyField = document.getElementById(qtyFieldId);

        if (checkbox.checked) {
            qtyField.disabled = false; // Habilita o campo de quantidade
            qtyField.required = true; // Torna o campo obrigatório se necessário
        } else {
            qtyField.disabled = true; // Desabilita o campo
            qtyField.value = ''; // Limpa o valor do campo
            qtyField.required = false; // Remove a obrigatoriedade
        }
    }
</script>

    
@endsection