<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CrearProcesoRequest;
use App\Proceso;
use App\User;

class ProcesosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $procesos = Proceso::Buscar($request->Busqueda)->where('user_id', '=', \Auth::user()->id)
        ->orderBy('created_at', 'desc')->paginate(15);
      return view('Invitado/procesos', compact('procesos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Invitado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrearProcesoRequest $request)
    {
      $data = [
        'Numero_proceso' => substr(time(), -8),
        'Descripcion' => $request->get('Descripcion'),
        'Sede' => $request->get('Sede'),
        'Presupuesto' => number_format($request->get('Presupuesto'), 3),
        //'Estado' => 'Pendiente',
        'user_id' => \Auth::user()->id
      ];

      $proceso = Proceso::create($data);

      $message = $proceso ? 'Proceso agregado correctamente!' : 'El Proceso No se pudo agregar';

      return redirect()->route('procesos.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Proceso $proceso)
    {
        return $proceso;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Proceso $proceso)
    {
        return view('Invitado.edit', compact('proceso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CrearProcesoRequest $request, Proceso $proceso)
    {
        $proceso->fill($request->all());

        $updated = $proceso->save();

        $message = $updated ? 'Proceso actualizado correctamente!' : 'El Proceso No se pudo actualizar';

        return redirect()->route('procesos.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
