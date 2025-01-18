@extends('layouts.main_cliente')

@section('content')
   

<div class="container-fluid px-4">
    <div class="row my-5">

        
            <form action="/reserva-cliente" method="POST">
                @csrf
                @method('POST')
          


          {{-- <div class="col-md-12">
          <label for="sucursal"class="form-label">Cliente <span class="text-danger">*</span></label>
          <select name="cliente" id="cliente" class="form-select form-select-sm">
            <option value=""></option>

            @foreach($clientes as $cliente)
             <option value="{{$cliente->id}}">{{$cliente->name}}</option>
            @endforeach

         
          </select>
        </div> --}}
         
             {{-- <input type="text" list="optionList" class="form-control" id="options" placeholder="Select an option">
            <datalist id="optionList">
                
            @foreach($clientes as $cliente)
            <option value="{{$cliente->id}}">{{$cliente->name}}</option>
                @endforeach
            </datalist> --}}
            <div class="col-md-12">
                <div class="row">

               
            <div class="col-md-6">
                <label for="sucursal"class="form-label">Data Inicio <span class="text-danger">*</span></label>
                <input type="date" name="data_inicio" id="data_inicio" class="form-control form-control-sm">
            </div>
            <div class="col-md-6">
                <label for="sucursal"class="form-label">Data Fim <span class="text-danger">*</span></label>
                <input type="date" name="data_fim" id="data_fim" class="form-control form-control-sm">
            </div>
    
            <div class="col-md-6">
                <label for="sucursal"class="form-label">Hora Inicio <span class="text-danger">*</span></label>
                <input type="time" name="hora_inicio" id="data_inicio" class="form-control form-control-sm">
            </div>
            <div class="col-md-6">
                <label for="sucursal"class="form-label">Hora Fim <span class="text-danger">*</span></label>
                <input type="time" name="hora_fim" id="data_fim" class="form-control form-control-sm">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <label for="sucursal"class="form-label">Tipo de Evento <span class="text-danger">*</span></label>
        <select name="tipo_evento" id="tipo_evento" class="form-select form-select-sm">
          <option value=""></option>
          @foreach($tipos as $tipo)
          <option value="{{$tipo->id}}">{{$tipo->name}}</option>
          @endforeach
      </select>
      </div>

            <div class="col-md-12">
          <label for="sucursal"class="form-label">Selecione os servicos <span class="text-danger">*</span></label>
          <br>
{{-- 
          @foreach($pacotes as $pacote)
    <label for="sucursal" class="form-label">{{$pacote->name}} <span class="text-danger">*</span></label> --}}
    @foreach($servicos as $servico)
        <div class="form-check d-flex mt-2">
            <!-- Checkbox para o serviço -->
            <div class="col-md-12">
            <div class="row">
                <div class="col-md-1">
                    <input class="form-check-input" type="checkbox" value="{{ $servico->id }}" 
                     id="servico_{{ $servico->id }}" name="servicos[]" 
                     onchange="toggleQtyField(this, 'qty_{{ $servico->id }}')">
                </div>

                <div class="col-md-5">
                    <label class="form-check-label" for="servico_{{ $servico->id }}">
                         {{ $servico->name }} - Preço {{ $servico->preco }}
                     </label>
                </div>
                <div class="col-md-2">
                    <!-- Campo de quantidade -->
                    <label for="" class="form-label">Quantidade</label>
                </div>
                <div class="col-md-4">
                    <input type="number" name="qty[]" id="qty_{{ $servico->id }}" 
                        class="form-control form-control-sm" style="width: 300px;" 
                        disabled> <!-- Desabilitado inicialmente -->
                </div>
            </div>
        </div>
    </div>
    @endforeach
{{-- @endforeach --}}
</div>
          
          
        <div class="mt-3">
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