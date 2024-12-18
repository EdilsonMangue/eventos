@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="col mt-4">
        <div class="row">
          <div class="col-sm-3">
            <div class="card  text-center">
              <div class="card-body">
                <h5 class="card-title">Reservas </h5>
                <p class="card-text"><span id="movel">{{count($reservas)}}</span></p>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
              <div class="card text-center">
                <div class="card-body">
                  <h5 class="card-title">Pagas</h5>
                  <p class="card-text"><span id="imovel">{{count($pagas)}}</span></p>
                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="card  text-center">
                <div class="card-body">
                  <h5 class="card-title">Canceladas</h5>
                  <p class="card-text"><span id="bom">{{count($cancelada)}}</span></p>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <div class="card  text-center">
                <div class="card-body">
                  <h5 class="card-title">Pendentes</h5>
                  <p class="card-text"><span id="bom">{{count($pendente)}}</span></p>
                </div>
              </div>
            </div>
          </div>
    </div>

    {{-- <h3 class="fs-4 mb-3 mt-5">Eventos</h3>
    <div class="col">
        <table class="table bg-white rounded shadow-sm  table-hover">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Local</th>
                    <th scope="col">Tipo de Evento</th>
                </tr>
            </thead>
            <tbody>
             @foreach($eventos as $evento)
             <tr>
                <td>{{$evento->name}}</td>
                <td>{{$evento->local_evento}}</td>
                <td>{{$evento?->tipo?->name}}</td>
             </tr>
             @endforeach
              
            </tbody>
        </table>
        {{ $eventos->links() }}
    </div>
     --}}

     <h3 class="fs-4 mb-3 mt-4">Reservas</h3>
     <div class="col">
         <table class="table bg-white rounded shadow-sm  table-hover">
             <thead>
                 <tr>
                     <th scope="col">Cliente</th>
                     <th scope="col">Data</th>
                     <th scope="col">servicos</th>
                     <th scope="col">Valor</th>
                     <th scope="col">Status</th>
                     <th scope="col"></th>
                 </tr>
             </thead>
             <tbody>

              @foreach($reservass as $reserva)
              <tr>
                 <td>{{$reserva?->cliente?->name}}</td>
                 <td>{{$reserva?->data_inicio}}</td>
                 <td>{{count($reserva?->itens)}}</td>
                 <td>{{$reserva->total}}</td>
                 <td>{{$reserva->status}}</td>
                 <td>
                     <a href="/reserva-edit/{{$reserva->id}}" class="btn btn-sm"><i class="far fa-edit"></i></a>
                     <button  value="{{$reserva->id}}"  class="btn btn-sm" id="delete_btn" ><i class="fas fa-solid fa-trash"></i></button>
                     @if($reserva->status == "pago")
                     <button  value="{{$reserva->id}}"  class="btn btn-sm" id="paid_btn" disabled ><i class="fas fa-money-bill"></i></button>
                     @else
                     <button  value="{{$reserva->id}}"  class="btn btn-sm" id="paid_btn"  ><i class="fas fa-money-bill"></i></button>
                     @endif
                     <a href="/detalhe/{{$reserva->id}}" class="btn btn-sm"><i class="fas fa-eye"></i></a>
                 </td>
              </tr>
              @endforeach
               
             </tbody>
         </table>

         {{ $reservass->links() }}
     </div>
</div>
@endsection