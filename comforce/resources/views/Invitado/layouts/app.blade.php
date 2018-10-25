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
        <form id="logout-form" action="{{ route('logout') }}" method="POST" >
            @csrf
            <li style="float:right"><button type="submit" style="cursor:pointer" name="button">Salir</button></li>
        </form>
        <li><label><strong>Bienvenido: {{ Auth::user()->name }}</strong></label></li>
      </ul>
      <!-- FIN BARRA DE ESTADO DE USUARIO -->

      <!--MENSAJE DE VERIFICACION-->
      @if(\Session::has('message'))
        @include('Invitado.Parcial.message')
      @endif

      <hr>
      <!-- INICIO CONTENIDO DE LA PAGINA -->
      @yield('content')
      <!-- INICIO CONTENIDO DE LA PAGINA -->
    </div>
  </body>
</html>
