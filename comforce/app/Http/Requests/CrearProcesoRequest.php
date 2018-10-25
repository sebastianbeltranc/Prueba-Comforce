<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearProcesoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'Descripcion'=>   'required|max:200',
          'Sede'=>          'required|max:6',
          'Presupuesto'=>   'required|numeric|max:999.999',
        ];
    }
}
