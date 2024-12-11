@extends('layouts.main')

@section('content')
    

  
  {{--Delete Modal--}}

  <div class="modal fade" id="delete_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        </div>
        <form action="/funcionario/delete" method="post">
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
        
        <!-- Button trigger modal -->

 
        <h3 class="fs-4 mb-3">Utilizadores</h3>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Permissão</th>
                        {{-- <th scope="col">Acao</th> --}}
                    </tr>
                </thead>
                <tbody>
                 @foreach($users as $user)
                 <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->permission}}</td>
                    {{-- <td>
                        <a href="/funcionario/{{$user->id}}" class="btn btn-sm"><i class="far fa-edit"></i></a>
                        <button  value="{{$user->id}}"  class="btn btn-sm" id="delete_btn" ><i class="fas fa-solid fa-trash"></i></button>
                    </td> --}}
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