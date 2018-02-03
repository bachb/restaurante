@extends('layouts.admin')
@section('menu-active', 'active')

@section('content')
<div class="container-fluid">
    <div class="row">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    
                    <h4 class="title">Estas editando {{ ($product->name) }} </h4>
                </div>
                <div class="card-content table-responsive">
                  <form method="post" action="{{ url('/admin/products/'.$product->id.'/edit') }}">
                    {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre del producto</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }} ">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Precio del producto</label>
                                    <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price', $product->price) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-8">
                                <div class="form-group label-floating">
                                    <label class="control-label">Descripción corta</label>
                                    <input type="text" class="form-control" name="description" value="{{ old('description', $product->description) }} ">
                                </div>
                            </div>                            
                            <div class="col-xs-12 col-sm-6 col-lg-4">
                                <select name="category_id" class="form-control">
                                    <option value=" {{ $product->category->id }} ">{{ $product->category->name }}</option>
                                    @foreach ($categories as $category)
                                    <option value=" {{$category->id}} ">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descripción más detallada del producto.(opcional)</label>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Escribe aquí.</label >
                                        <textarea class="form-control" rows="5" name="long_description">{{ old('long_description', $product->long_description) }}</textarea >
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <button class="btn btn-primary">Guardar cambios</button>
                        <a href=" {{ url('/admin/products') }} " class="btn btn-default">Cancelar</a>
                  </form>  
                </div>
            </div>
            <div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Imágenes del producto {{ $product->name }} </h2>

            <form method="post" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="photo" required>
                <button type="submit" class="btn btn-primary btn-round">Subir nueva imagen</button>
                <a href="{{ url('/admin/products') }}" class="btn btn-default btn-round">Volver al listado de productos</a>
                
            </form>
            <hr>

        </div>

    </div>

</div>            










        </div>
    </div>
</div>



@endsection
