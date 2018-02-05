@extends('layouts.app')
    <!--[if lt IE 9]>
    <p class="browserupgrade">
      Estas usando un navegador
      <strong>desactualizado.</strong>
      Por favor
    </p>
    <a href="http://browsehappy.com/">
      actualiza tu navegador
      para una mejor experiencia
    </a>
    <![endif]-->
      
    <div class="video-container">
      <video autoplay height="720" loop poster="{{ asset('videos/img/bbq.jpg') }}" width="1280">
        <source src="{{ asset('videos/mp4/bbq.mp4') }}" typ="video/mp4">
        <source src="{{ asset('videos/webm/bbq.webm') }}" typ="video/webm">
      </video>
    </div>
    <div class="row full-height middle-xs center-xs relative up" id="home">
      <div class="col-xs-12">
        <div class="box white-text">
            @foreach ($company as $restaurante)
              <img src="{{ $restaurante->logo }}" width="200">
              <h1 class="dancing-script tittle no-margin">{{ $restaurante->name }}</h1>
            @endforeach
            <p id="is-open">
              <i class="glyphicon glyphicon-time"></i>
              <span class="text">
                Abierto ahora
                Abierto de 8.00am a 6:00pm
              </span>
            </p>
          
        </div>
      </div>
      <nav class="fixed top right navigation white-text" id="navigation">
        <ul class="list-inline">
          <li>
            <a href="{{ url('/') }}">Home</a>
          </li>
          <li>
            <a href="#menu">Menú</a>
          </li>
          <li>
            <a href="#gallery">Galería</a>
          </li>
          <li>
            <a href="#contact">Contacto</a>
          </li>
          <li>
            <a href="#location">Como llegar</a>
          </li>
          @guest
            <li><a href="{{ route('login') }}">Ingresar</a></li>
          @else
            <li>
              <a href="{{ url('/home') }}"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
            </li>
          @endguest
        </ul>

      </nav>
      <div class="absolute black large-padding white-text full-width" id="mensaje">
        <div class="row middle-xs center-xs">
          <div class="col-xs-7 col-sm-6 white-text medium">
            @foreach ($company as $restaurante)
              {{ $restaurante->description }}
            @endforeach            
          </div>
        </div>
      </div>
      <div class="col-xs hidden absolute black large-padding white-text full-width" id="sticky-navigation">
        <div class="box">
          <div class="col-xs-9 col-md-6 middle-xs dancing-script tittle-logo">
            @foreach ($company as $restaurante)
              <img src="{{ $restaurante->url }}" width="60">
              {{ $restaurante->name }}
            @endforeach
          </div>
          <nav class="text-right navigation" id="responsive-nav">
            <i class="glyphicon glyphicon-menu-hamburger white-text burger glyphicon-remove" id="menu-opener"></i>
            <ul class="list-inline">
              <li>
                <a class="menu-link" href="#home">Home</a>
              </li>
              <li>
                <a class="menu-link" href="#menu">Menú</a>
              </li>
              <li>
                <a class="menu-link" href="#gallery">Galería</a>
              </li>
              <li>
                <a class="menu-link" href="#contact">Contacto</a>
              </li>
              <li>
                <a class="menu-link" href="#location">Como llegar</a>
              </li>
              @guest
                <li><a href="{{ route('login') }}">Ingresar</a></li>
              @else
                <li>
              <a href="{{ url('/home') }}"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
            </li>
              @endguest
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <div class="text-center relative" id="menu">
      <div class="absolute white" id="menu-title">
        <h2 class="dancing-script tittle">Menú</h2>
      </div>
      <div class="row">
        @foreach ($outstandings as $outstanding)
          <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12 food" style="background-image:url({{ $outstanding->featured_image_url }}">
          <div class="screen">
            <div class="row middle-xs full-height">
              <div class="col-xs-12 white-text">
                <h3 class="dancing-script subtitle">{{ $outstanding->name }}</h3>
                   <p class="no-margin">  $ {{ number_format($outstanding->price) }}</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach          
      </div>        
    </div>
   <div id="gallery">
      <div class="inner">
        <div class="image" style="background-image:url(img/food/club-sandwich.jpg)"></div>
        <div class="image" style="background-image:url(img/food/papas.jpg)"></div>
        <div class="image" style="background-image:url(img/food/hamburger.jpg)"></div>
        <div class="image" style="background-image:url(img/food/panini.jpg)"></div>
        <div class="image" style="background-image:url(img/food/club-sandwich.jpg)"></div>
        <div class="image" style="background-image:url(img/food/papas.jpg)"></div>
      </div>
    </div>
    <div class="container">
      <div class="card white black-text text-center relative">
        @foreach ($company as $restaurante)
        <h3 class="medium slim">
          En
          <strong class="dancing-script medium">{{ $restaurante->name }}</strong>
          cocinar no es una profesión, no es una técnica, es un
          <strong class="dancing-script medium">arte.</strong>
        </h3>
        <p class="top-space"> {{ $restaurante->long_description }} -          
            <strong class="dancing-script">{{ $restaurante->user->name }} - Administrador</strong>
        </p><br>
        @endforeach
        <table class="table table-striped">
          <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Descripción</th>
                <th>Precio</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($products as $product)
            <tr>              
                <td>{{ $product->name }}</td>
                <td>{{ $product->category ? $product->category->name : 'General' }}</td>
                <td>{{ $product->description }}</td>
                <td>$ {{ number_format($product->price) }}</td>              
            </tr>
            @endforeach
          </tbody>          
        </table>
      </div>


    </div>
  <div class="black white-text full-height" id="contact">
    <div class="row middle-xs full-height">
      <div class="col-xs-12 contacto">
        <div class="box">
          @foreach ($company as $restaurante)
          <form action="https://formspree.io/{{ $restaurante->email }}" id="contact-form" method="POST">
             @endforeach
            <div class="row center-xs">
              <div class="col-xs-9 col-md-7 col-lg-7">
                <div class="box">
                  <input name="Correo" placeholder="Escribe tu correo electrónico" required type="email">
                  <input class="input" name="Nombre" placeholder="Escribe tu nombre" required type="text">
                  <textarea class="input" name="Mensaje" placeholder="Déjanos un mensaje" required></textarea>
                  <button class="btn btn-success" type="submit">Enviar</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    @foreach ($company as $restaurante)
    <div id="location">
      <div id="map"></div>
      <div class="black large-padding white-text text-center medium" id="message">
        
              {{ $restaurante->name }} en {{ $restaurante->municipio }}              
        
      </div>
    </div>
    @endforeach
  </div>
