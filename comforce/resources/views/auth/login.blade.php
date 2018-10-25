<!-- EXTENCION DE CODIGO HTML -->
@extends('layouts.app')

<!-- INICIO SECCION DE CONTENIDO DE LA PAGINA -->
@section('content')
<div class="login">
  <h2>Ingresar</h2>
  <!-- INICIO FORMLUARIO DE INGRESO -->
  <form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="container">
      <label for="uname"><b>Correo</b></label>
      <input type="email" name="email" value="{{ old('email') }}" placeholder="Ingrese su correo" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" name="password" id="password" placeholder="Ingrese su contraseña" required>

      <button type="submit">Entrar</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <span class="regist"><a href="{{ route('register') }}">{{ __('Registrarse') }}</a></span>
      <span class="psw"><a href="{{ route('password.request') }}">{{ __('Olvidé mi contraseña') }}</a></span>
    </div>
  </form>
  <!-- FIN FORMLUARIO DE INGRESO -->
</div>
@endsection
<!-- FIN SECCION DE CONTENIDO DE LA PAGINA -->
