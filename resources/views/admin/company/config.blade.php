@extends('layouts.admin')
@section('config-active', 'active')

@section('content')
@if (session('notification'))
<div class="alert alert-success col-md-6">
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
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Datos básicos</h4>
                        <p class="category">Completa el perfil</p>
                    </div>
                    <div class="card-content">
                        <form>
                            <div class="row">
                                @foreach ($company as $restaurante)
                                <div class="col-xs-12 col-sm-6 col-lg-8">                             
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nombre del local</label>
                                        <input type="text" class="form-control" value=" {{ $restaurante->name }} " disabled>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Número de images destacadas</label>
                                        <input type="text" class="form-control" value=" {{ $restaurante->limit }} " disabled>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                            @foreach ($company as $restaurante)
                            <div class="row">
                                <div class="col-md-12">                                    
                                    <div class="form-group label-floating">
                                        <label class="control-label">Email</label>
                                        <input type="text" class="form-control" value=" {{ $restaurante->email }} " disabled>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">                                    
                                    <div class="form-group label-floating">
                                        <label class="control-label">Dirección</label>
                                        <input type="text" class="form-control" value=" {{ $restaurante->direccion }} " disabled>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Municipio</label>
                                        <input type="text" class="form-control" value="{{ $restaurante->municipio }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Departamento</label>
                                        <input type="text" class="form-control" value="{{ $restaurante->departamento }}"disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descripción corta del local</label>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Eslogan o frease del local.</label >
                                        <textarea class="form-control" rows="5" disabled>{{ $restaurante->description }}</textarea >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descripción extensa del local</label>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Descipción principal del sitio que administras.</label >
                                            <textarea class="form-control" rows="5" disabled>{{ $restaurante->long_description }}</textarea >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ url('/admin/company/'.$restaurante->id.'/edit') }}" class="btn btn-primary pull-right">
                                Editar
                            </a>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="{{ url('/') }} ">
                            @foreach ($company as $restaurante)
                            <img class="img" src="{{ $restaurante->url }}" />
                            @endforeach
                        </a>
                    </div>
                    <div class="content">
                        <h6 class="category text-gray">Logo del local</h6>
                        <h4 class="card-title">{{ auth()->user()->name }}</h4>
                        <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Usuario</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->name }}" disabled>
                        </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Correo</label>
                                <input type="email" class="form-control" value="{{ auth()->user()->email }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>        
    </div>
</div>

@endsection