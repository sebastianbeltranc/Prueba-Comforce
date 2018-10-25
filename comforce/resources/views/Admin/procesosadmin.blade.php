@extends('Invitado.layouts.app')

@section('content')

<!-- INICIO BARRA SUPERIOR -->
<div class="barrasup">
  <!-- INICIO TITULO Y AGREGAR PROCESO -->
  <div class="crearproceso">
    <h2>Lista de Procesos</h2>
  </div>
  <!-- FIN TITULO Y AGREGAR PROCESO -->

  <!-- INICIO BUSQUEDA PROCESO SEGUN LA FECHA -->
  <div class="buscador">
    {!! Form::open (['route'=>'procesosadmin.index', 'method'=>'GET']) !!}
          {!!
            Form::date(
            'Busqueda',
            null
          )
          !!}
          <button type="submit" style="cursor:pointer" name="button">Buscar</button>
    {!! Form::close() !!}
  </div>
  <!-- FIN BUSQUEDA PROCESO SEGUN LA FECHA -->
</div>
<!-- FIN BARRA SUPERIOR -->
<hr>
<!-- INICIO TABLA DE DATOS DE PROCESOS -->
<div style="overflow-x:auto;">
  <table>
    <tr>
      <th>Numero de proceso</th>
      <th>Descripcion</th>
      <th>Sede</th>
      <th>Presupuesto (COP)</th>
      <th>Presupuesto (USD)</th>
      <th>Fecha de creación</th>
      <th>Eliminar</th>
    </tr>
    @foreach($procesos as $proceso)
    <tr>
      <td>{{ $proceso->Numero_proceso }}</td>
      <td>{{ $proceso->Descripcion }}</td>
      <td>{{ $proceso->Sede }}</td>
      <td>{{ $proceso->Presupuesto }}</td>
      <td>{{ number_format(($proceso->Presupuesto * 0.3159)/1.000, 2) }}</td>
      <td>{{ $proceso->created_at }}</td>
      <td>
        {!! Form::open(['route'=>['procesosadmin.destroy', $proceso]]) !!}
          <input type="hidden" name="_method" value="DELETE">
          <button style="background-color: #CC0000;" onclick="return confirm('Eliminar Proceso ?')">X</button>
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </table>
</div>
<!-- FIN TABLA DE DATOS DE PROCESOS -->

<!-- PAGINACION -->
<div class="paginacion">
    <?php echo $procesos->render(); ?>
</div>
@endsection
