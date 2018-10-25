<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proceso;

class ProcesosAdminController extends Controller
{
  public function index(Request $request)
  {
      $procesos = Proceso::Buscar($request->Busqueda)->orderBy('created_at', 'desc')->paginate(15);
    return view('Admin/procesosadmin', compact('procesos'));
  }

  public function destroy($id)
  {
    $proceso = Proceso::find($id);
    $delete = $proceso->delete();
    $message = $delete ? 'Proceso eliminado correctamente!' : 'El proceso No se pudo eliminar';
    return redirect()->route('procesosadmin.index')->with('message', $message);
  }
}
