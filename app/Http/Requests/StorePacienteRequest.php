<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePacienteRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nome' => ['required','string','max:255'],
            'cpf'  => ['required','string','max:14','unique:pacientes,cpf'],
        ];
    }

    public function prepareForValidation(): void
    {
        if ($this->has('cpf')) {
            $this->merge(['cpf' => preg_replace('/\D+/', '', $this->cpf)]);
        }
    }
}
