@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif


<div>
    <div class="card">
        <div class="card-header">
             <input wire:model="search" class="form-control" placeholder="Ingrese el nombre o correo del usuario">
        </div>
        @if($users->count())
        <div class="card-body">
             <table class="table table-striped">
                 <thead>      
                    <tr>   
                        <th>No.</th>
                        <th>NOMBRE</th>
                        <th>EMAIL</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
    
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td width="10px">
                                <a class="btn btn-primary" href="{{route('admin.users.edit', $user)}}">Editar</a>
                            </td>                  
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
  
            <div class="card-footer">
            {{$users->links()}}
            </div>
            @else
            <div class="card-body">
                <strong>No hay registros</strong>
            </div>

            @endif
    </div>
</div>
