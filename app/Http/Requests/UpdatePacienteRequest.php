<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePacienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $pacienteId = $this->route('paciente')?->id;

        return [
            'nome' => ['sometimes','required','string','max:255'],
            'cpf'  => ['sometimes','required','string','max:14','unique:pacientes,cpf,'.$pacienteId],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'cpf.required'  => 'O CPF é obrigatório.',
            'cpf.unique'    => 'Já existe um paciente com este CPF.',
        ];
    }
}
