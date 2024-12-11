@extends('layouts.main')

@section('content')
    

  
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
            <a href="/evento-create" class="btn btn-primary" style="width: 140px;">
                <i
                class=" fas fa-solid fa-plus me-1"></i> Evento
            </a>
        </div>
        <!-- Button trigger modal -->

 
        <h3 class="fs-4 mb-3">Eventos</h3>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Local</th>
                        <th scope="col">Tipo de Evento</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                 @foreach($eventos as $evento)
                 <tr>
                    <td>{{$evento->name}}</td>
                    <td>{{$evento->local_evento}}</td>
                    <td>{{$evento?->tipo?->name}}</td>
                    <td>
                        <a href="/evento/{{$evento->id}}" class="btn btn-sm"><i class="far fa-edit"></i></a>
                        <button  value="{{$evento->id}}"  class="btn btn-sm" id="delete_btn" ><i class="fas fa-solid fa-trash"></i></button>
                    </td>
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
         $(document).ready(function(){
            $(document).on('click', '#delete_btn', function(e){
                e.preventDefault();
          var id = $(this).val();

          $('#sucursal_id').val(id);
          $('#delete_Modal').modal('show');  
            })
         })
    </script>
@endsection