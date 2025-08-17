<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePacienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Já estamos autenticando via Sanctum nas rotas
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => ['required','string','max:255'],
            'cpf'  => ['required','string','max:14','unique:pacientes,cpf'],
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
