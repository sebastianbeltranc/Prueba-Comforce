<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Comforce</title>
    <!-- INICIO ESTILOS -->
    <link rel="stylesheet" href="{{asset('/css/comforce.css')}}">
    <link rel="stylesheet" href="{{asset('/css/procesos.css')}}">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <!-- FIN ESTILOS -->
  </head>
  <body>
    <div class="container">
      <!-- INICIO BARRA DE ESTADO DE USUARIO -->
      <ul>
        <li><a class="active" href="{{asset('/')}}">Login</a></li>
        @if(Auth::check())
          <form id="logout-form" action="{{ route('logout') }}" method="POST" >
              @csrf
              <li><button type="submit" style="cursor:pointer" name="button">Salir</button></li>
          </form>
          <li><label><strong>Bienvenido: {{ Auth::user()->name }}</strong></label></li>
        @else
        @endif
      </ul>
      <!-- FIN BARRA DE ESTADO DE USUARIO -->

      <!--INICIO ERRORES-->
        @include('Invitado.Parcial.errors')
      <!--FIN ERRORES-->

      <hr>
      <!-- INICIO CONTENIDO DE LA PAGINA -->
      @yield('content')
      <!-- INICIO CONTENIDO DE LA PAGINA -->
    </div>
  </body>
</html>
