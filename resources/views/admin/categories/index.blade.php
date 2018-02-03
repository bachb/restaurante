@extends('layouts.admin')
@section('category-active', 'active')

@section('content')
@if (session('notification'))
<div class="alert alert-success col-md-12">
<div class="container-fluid">
  <div class="alert-icon">
    <i class="material-icons">check</i>
  </div>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true"><i class="material-icons">clear</i></span>
  </button>
  {{ session('notification') }}
</div>
</div>
@endif
<div class="container-fluid">
    <div class="row">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    @if (auth()->user()->admin)
                    <h4 class="title">Hacer edición, actualización o eliminación de categorias</h4>
                    @endif
                </div>
                <div class="card-content table-responsive">
                    <table class="table" id="hol">
                        <thead class="text-primary">
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                            	<td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description}}</td>
                                <td class="td-actions text-right">
                                	<form method="post" action="{{ url('/admin/categories/'.$category->id) }}">
                                        {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                        <a href="{{ url('/admin/categories/'.$category->id.'/edit') }}" rel="tooltip" title="Editar producto" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>                                        
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Datos básicos</h4>
                                    <p class="category">Completa el perfil del local</p>
                                </div>
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li> {{ $error }} </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="card-content">
                                    <form  method="post" action="">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nueva categoría</label>
                                                    <input type="text" class="form-control" name="name" value=" {{ old('name') }} ">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
            	                                <div class="form-group label-floating">
                                                    <label class="control-label">Descripción</label>
                                                    <input type="text" class="form-control" name="description" value=" {{ old('description') }} ">
                                                </div>
            	                            </div>                                
                                        </div>                           
                                        <button class="btn btn-primary">Guardar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" ></script>
<script>
    $(document).ready(function(){
    $('#hol').DataTable();
});
</script>
@endsection

@endsection
