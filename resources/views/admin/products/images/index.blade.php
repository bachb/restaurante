@extends('layouts.admin')
@section('name-rest', $company->name )
@section('menu-active', 'active')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Imágenes del producto {{ $product->name }}</h4>
                        <p class="category">Sube imagenes y selecciona tu favorita.</p>
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
                        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                            <form method="post" action="" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card card-stats ">
                                    <br>
                                    <label for="">Subir una nueva imagen.</label>
                                    <input type="file" name="photo" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-round">Agregar</button>
                                <a href="{{ url('/home') }}" class="btn btn-default btn-round">Volver</a>
                                
                            </form>
                                
                        </div>
                        <div class="row">
                            @foreach ($images as $image)
                            <div class="col-md-4">
                                <div class="card card-stats ">
                                    <div class="card-header" data-background-color="orange">
                                        <img src=" {{ $image->url }} " width="250">
                                    </div>
                                        <form method="post" action="">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="hidden" name="image_id" value=" {{ $image->id }} ">
                                            <div class="card-footer text-center">
                                                <div>            
                                                    <button rel="tooltip" title="Eliminar" class="btn btn-danger btn-fab btn-fab-mini btn-round">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                    @if ($image->featured)
                                                        <button type="button" class="btn btn-info btn-fab btn-fab-mini btn-round" rel="tooltip" title="Imagen destacada de este Producto">
                                                            <i class="material-icons">favorite</i>
                                                        </button>
                                                    @else
                                                    <a href="{{ url('/admin/products/'.$product->id.'/images/select/'.$image->id) }}" class="btn btn-primary btn-fab btn-fab-mini btn-round" rel="tooltip" title="Destacar imagen para este producto.">
                                                        <i class="material-icons">favorite</i>
                                                    </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </form>                                
                                    </div>
                                </div>
                            @endforeach
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
</div>



@endsection
