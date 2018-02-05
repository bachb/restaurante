@extends('layouts.admin')
@section('name-rest', $company->name )

@section('config-active', 'active')

@section('content')
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
                        <form  method="post" action="{{ url('/admin/company/'.$company->id.'/edit') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-header" data-background-color="blue">
                                        <img src="{{ $company->url }}" alt=""> 
                                    </div>
                                    <div class="card-content">
                                        <p class="category">Logo actual</p>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <br>
                                    <label for="">Sube una imagen solo si deseas cambiar el logo.</label>
                                    <input type="file" name="logo">
                                    <div class="card-content">
                                        <p class="category">carga un logo.</p>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-xs-12 col-sm-6 col-lg-8">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nombre del local</label>
                                        <input type="text" class="form-control" name="name" value=" {{ old('name', $company->name) }} ">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-4">
                                    <select name="limit" class="form-control">
                                        <option value=" {{ $company->limit }} ">Imagenes destacadas</option>
                                        <option value="8">8</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">                                    
                                    <div class="form-group label-floating">
                                        <label class="control-label">Email</label>
                                        <input type="email" class="form-control" name="email" value=" {{ old('email', $company->email) }} " >
                                    </div>                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">                                    
                                    <div class="form-group label-floating">
                                        <label class="control-label">Dirección</label>
                                        <input type="text" class="form-control" name="direccion" value=" {{ old('direccion', $company->direccion) }} ">
                                    </div>                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Municipio</label>
                                        <input type="text" class="form-control" name="municipio" value="{{ old('municipio', $company->municipio) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Departamento</label>
                                        <input type="text" class="form-control" name="departamento" value="{{ old('departamento', $company->departamento) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descripción corta del local</label>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Eslogan o frease del local.</label >
                                        <textarea class="form-control" rows="5" name="description">{{ old('description', $company->description) }}</textarea >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descripción extensa del local</label>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Descipción principal del sitio que administras.</label >
                                            <textarea class="form-control" rows="5" name="long_description">{{ old('long_description', $company->long_description) }}</textarea >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary">Guardar cambios</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection