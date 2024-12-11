@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
           <div class="col-md-3">
              <p>Nome</p>
              <p id="nome">{{$reservas->cliente->name}}</p>
           </div>

           <div class="col-md-3">
            <p>Servicos</p>
            <p id="servicos">{{count($reservas->itens)}}</p>
            </div>

            <div class="col-md-3">
                <p>Total</p>
                <p id="total">{{$reservas->total}}</p>
            </div>

            <div class="col-md-3">
               <a href="/print/reserva/{{$reservas->id}}" class="btn btn-sm" target="_blank"> <i class="fas fa-file-pdf me-2"></i></a>
            </div>

            <h3 class="fs-4 mb-3 mt-5">Reservas</h3>
            <div class="col-md-12">
                <table class="table bg-white rounded shadow-sm  table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Servico</th>
                            <th scope="col">Preco</th>
                            <th scope="col">Quantidade</th>
                        </tr>
                    </thead>
                    <tbody>
    
                     @foreach($reservas->itens as $reserva)
                     <tr>
                        <td>{{$reserva?->servico?->name}}</td>
                        <td>{{$reserva?->servico?->preco}}</td>
                        <td>{{$reserva?->quantidade}}</td>
                     </tr>
                     @endforeach
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>

</script>
    
@endsection