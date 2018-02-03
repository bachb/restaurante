@extends('layouts.admin')
@section('menu-active', 'active')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@if ($errors->any())
<div class="alert alert-danger col-md-12">
<div class="container-fluid">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true"><i class="material-icons">clear</i></span>
  </button>
    @foreach ($errors->all() as $error)
        <li> {{ $error }} </li>
    @endforeach
</div>
</div>
@endif

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
                    <h4 class="title">Hacer edición, actualización o eliminación de productos</h4>
                    @else
                    <h4 class="title">Nuestro amplio menú para una variedad de gustos.</h4>
                    @endif
                    
                    @foreach ($company as $restaurante)
                    <p class="category">Productos de {{ $restaurante->description }} </p>
                    @endforeach
                </div>
                <div class="card-content table-responsive">
                    <table class="table" id="menu">
                        <thead class="text-primary">
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Orden</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category ? $product->category->name : 'General' }}</td>
                                <td>{{ $product->description }}</td>
                                <td class="text-primary">{{ $product->price }}</td>
                                <td class="text-primary">{{ $product->order }}</td>
                                <td class="td-actions text-right">
                                @if (auth()->user()->admin)
                                <form method="post" action="{{ url('/admin/products/'.$product->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="hidden" name="image_id" value=" {{ $product->id }} ">
                                    @if ($product->featured)
                                    <a href="{{ url('/admin/products/'.$product->id) }}" rel="tooltip" title="Destacado" class="btn btn-primary btn-simple btn-xs">
                                        <i class="material-icons">favorite</i>
                                    </a>
                                    @else
                                    <a href="{{ url('/admin/products/'.$product->id) }}" rel="tooltip" title="Añadir favorito" class="btn btn-primary btn-simple btn-xs">
                                        <i class="material-icons">favorite_border</i>
                                    </a>
                                    @endif
                                    <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar" class="btn btn-primary btn-simple btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                        <i class="material-icons">close</i>
                                    </button>
                                    <a href="{{ url('/admin/products/'.$product->id.'/images') }}" rel="tooltip" title="Imagenes producto" class="btn btn-warning btn-simple btn-xs">
                                        <i class="fa fa-image"></i>
                                        </a>
                                </form>
                                @else
                                <a href="" rel="tooltip" title="ver" class="btn btn-danger btn-simple btn-xs">
                                        <i class="material-icons">photo</i>
                                </a>
                                @endif
                                   
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
             @if (auth()->user()->admin)
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    
                    <h4 class="title">Crear un nuevo producto </h4>
                </div>
                <div class="card-content table-responsive">
                  <form method="post" action="{{ url('/admin/products') }}">
                    {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre del producto</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }} ">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Precio del producto</label>
                                    <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <select name="category_id" class="form-control">
                                    <option value="">Categoría</option>
                                    @foreach ($categories as $category)
                                    <option value=" {{$category->id}} ">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label class="control-label">Descripción corta</label>
                                    <input type="text" class="form-control" name="description" value="{{ old('description') }} ">
                                </div>
                            </div>
                        </div>
                          
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Descripción más detallada del producto.(opcional)</label >
                                        <textarea class="form-control" rows="5" name="long_description">{{ old('long_description') }}</textarea >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary">Guardar cambios</button>
                        <button type="reset" class="btn btn-default">Borrar datos</button>
                  </form>  
                </div>
            </div>
            @endif
        </div>
    </div>
</div>


@endsection

