@extends('Invitado.layouts.app')

@section('content')
<div class="formulario">
  <!-- INICIO TITULO -->
  <h2>Agregar proceso</h2>
  <!-- FIN TITULO -->

  <!-- MENSAJES DE ERROR SEGUN SE PRESENTEN EN EL FORMULARIO -->
  @if (count($errors)>0)
    @include('Invitado.Parcial.errors')
  @endif

  <!-- INICIO FORMULARIO PARA CREAR PROCESO -->
  {!! Form::open (['route'=>'procesos.store']) !!}
  <div class="container">
      <div class="row">
        <div class="col-25">
          <label for="fname">Descripcion de proceso</label>
        </div>
        <div class="col-75">
          {!!
            Form::textarea(
              'Descripcion',
              null,
              array(
                'placeholder'=>'Escribe el detalle de tu proceso en cuestion (maximo 200 caracteres)',
                'autofocus'=>'autofocus',
                'required'=>'required',
                'maxlength' => '200',
              )
            )
          !!}
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="country">Sede</label>
        </div>
        <div class="col-75">
          {!!
            Form::select(
              'Sede',[
                'Bogotá' => 'Bogotá',
                'Mexico' => 'Mexico',
                'Perú' => 'Perú',
              ],
              null,
              array(
                'class'=>'nomcategoria',
                'placeholder'=>'Selecciona...',
                'required'=>'required',
              )
            )
          !!}
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Presupuesto</label>
        </div>
        <div class="col-75">
          {!!
          Form::number(
            'Presupuesto',
            null,
            array(
            'placeholder'=>'999.999 (COP)',
              'required'=>'required',
              'step'=>'any',
            )
          )
        !!}
        </div>
      </div>
      <div class="btns">
        <div class="return">
          <a href="{{ route('procesos.index') }}"> <button type="button" name="button">Cancelar</button></a>
        </div>
        <div class="save">
          {!! Form::submit('Crear', array('style'=>'cursor:pointer')) !!}
        </div>
      </div>
  </div>
  {!! Form::close() !!}
  <!-- FIN FORMULARIO PARA CREAR PROCESO -->
</div>
@endsection
