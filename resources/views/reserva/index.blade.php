@extends('layouts.main')

@section('content')
    
@if(session('success'))
<div class="alert alert-success" role="alert">
{{session('success')}}
</div>
@elseif(session('update'))
<div class="alert alert-success" role="alert">
{{session('update')}}
 </div>
@elseif(session('error'))
<div class="alert alert-danger" role="alert">
  {{session('error')}}
</div>
@elseif(session('delete'))
<div class="alert alert-danger" role="alert">
  {{session('delete')}}
</div>
@endif
  
 {{--Delete Modal--}}

 <div class="modal fade" id="paid_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <form action="/payment" method="post">
          @csrf
          @method('POST')
      <div class="modal-body">
        <input type="text" hidden  name="id" id="sucursal_id">
          
        <label for="edit_telephone"class="form-label mt-1">Cliente <span class="text-danger"></span></label>
        <input type="text" name="cliente" id="cliente" class="form-control form-control-sm" disabled>
        <input type="text" name="cliente_id" id="cliente_id" hidden>
        <input type="text" name="cliente" id="cliente" class="form-control form-control-sm" hidden>

        <label for="edit_telephone"class="form-label mt-1">Valor <span class="text-danger"></span></label>
        <input type="text" name="valor" id="valor" class="form-control form-control-sm" disabled>
        <input type="text" name="total" id="total" class="form-control form-control-sm" hidden>

        <label for="edit_telephone"class="form-label mt-1">Estado <span class="text-danger"></span></label>
        <select name="status" id="status" class="form-select form-select-sm">
          <option value=""></option>
          {{-- <option value="pendente">Pendente</option>
          <option value="cancelado">Cancelado</option> --}}
          <option value="pago">Pago</option>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary delete_buttom">Apagar</button>
      </div>
  </form>
    </div>
  </div>
</div>

  {{--Delete Modal--}}

  <div class="modal fade" id="delete_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        </div>
        <form action="/tipoevento/delete" method="post">
            @csrf
            @method('DELETE')
        <div class="modal-body">
          <input type="text" hidden  name="id" id="sucursal_id">
           <h6>Tens Certeza que queres apagar?</h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary delete_buttom">Apagar</button>
        </div>
    </form>
      </div>
    </div>
  </div>
<div class="container-fluid px-4">
    <div class="row my-5">
        <div class="text-end">
            <a href="/reserva-create" class="btn btn-primary" style="width: 140px;">
                <i
                class=" fas fa-solid fa-plus me-1"></i>   Reserva
            </a>
        </div>
        <!-- Button trigger modal -->

 
        <h3 class="fs-4 mb-3">Reservas</h3>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col">Cliente</th>
                        <th scope="col">Data</th>
                        <th scope="col">serviços</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                 @foreach($reservas as $reserva)
                 <tr>
                    <td>{{$reserva?->cliente?->name}}</td>
                    <td>{{$reserva?->data_inicio}}</td>
                    <td>{{count($reserva?->itens)}}</td>
                    <td>{{$reserva->total}}</td>
                    <td>{{$reserva->status}}</td>
                    <td>
                        <a href="/reserva-edit/{{$reserva->id}}" class="btn btn-sm"><i class="far fa-edit"></i></a>
                        <button  value="{{$reserva->id}}"  class="btn btn-sm" id="delete_btn" ><i class="fas fa-solid fa-trash"></i></button>
                        @if($reserva->status == "pago" || $reserva->status == "cancelado" )
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

            {{ $reservas->links() }}
        </div>
    </div>
</div>


@endsection

@section('script')
    <script>
         $(document).ready(function(){
            $(document).on('click', '#delete_btn', function(e){
                e.preventDefault();
          var id = $(this).val();

          $('#sucursal_id').val(id);
          $('#delete_Modal').modal('show');  
            })

            $(document).on('click', '#paid_btn', function(e){
                e.preventDefault();
          var id = $(this).val();

          $('#sucursal_id').val(id);
          $('#paid_Modal').modal('show'); 
          
          $.ajax({
            type:"GET",
            url:"/reserva/"+id,
            success: function(response){
              console.log(response);
              $('#cliente_id').val(response.cliente.id);
              $('#cliente').val(response.cliente.name);
              $('#valor').val(response.total);
              $('#total').val(response.total);
              $('#status').val(response.status);
            }
          });
            })
         })
    </script>
@endsection