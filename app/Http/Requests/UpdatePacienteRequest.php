<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePacienteRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        $id = $this->route('paciente')->id ?? null;

        return [
            'nome' => ['required','string','max:255'],
            'cpf'  => ['required','string','max:14','unique:pacientes,cpf,' . $id],
        ];
    }

    public function prepareForValidation(): void
    {
        if ($this->has('cpf')) {
            $this->merge(['cpf' => preg_replace('/\D+/', '', $this->cpf)]);
        }
    }
}
