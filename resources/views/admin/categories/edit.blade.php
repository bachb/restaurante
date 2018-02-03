@extends('layouts.admin')
@section('menu-active', 'active')

@section('content')
<div class="container-fluid">
    <div class="row">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li> {{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <h4 class="title">Estas editando {{ ($category->name) }} </h4>
                </div>
                <div class="card-content table-responsive">
                  <form method="post" action="{{ url('/admin/categories/'.$category->id.'/edit') }}">
                    {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre del producto</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }} ">
                                </div>
                            </div>
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label">Descripción corta</label>
                            <input type="text" class="form-control" name="description" value="{{ old('description', $category->description) }} ">
                        </div>
                        <button class="btn btn-primary">Guardar cambios</button>
                        <a href=" {{ url('/admin/categories') }} " class="btn btn-default">Cancelar</a>
                  </form>  
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
