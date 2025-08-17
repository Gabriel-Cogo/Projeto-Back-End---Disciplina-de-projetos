<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PacienteController extends Controller
{
    public function index()
    {
        $list = Paciente::where('user_id', Auth::id())->orderBy('id','desc')->get();
        return response()->json($list);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => ['required','string','max:255'],
            'cpf'  => ['required','string','max:14','unique:pacientes,cpf'],
        ]);

        $data['cpf'] = preg_replace('/\D+/', '', $data['cpf']);

        $paciente = Paciente::create([
            'nome'    => $data['nome'],
            'cpf'     => $data['cpf'],
            'user_id' => Auth::id(),
        ]);

        Log::info('Paciente criado (API)', ['user_id' => Auth::id(), 'paciente_id' => $paciente->id]);

        return response()->json($paciente, 201);
    }

    public function show(Paciente $paciente)
    {
        $this->authorizePaciente($paciente);
        return response()->json($paciente);
    }

    public function update(Request $request, Paciente $paciente)
    {
        $this->authorizePaciente($paciente);

        $data = $request->validate([
            'nome' => ['sometimes','required','string','max:255'],
            'cpf'  => ['sometimes','required','string','max:14','unique:pacientes,cpf,'.$paciente->id],
        ]);

        if (isset($data['cpf'])) {
            $data['cpf'] = preg_replace('/\D+/', '', $data['cpf']);
        }

        $paciente->update($data);

        Log::info('Paciente atualizado (API)', ['user_id' => Auth::id(), 'paciente_id' => $paciente->id]);

        return response()->json($paciente);
    }

    public function destroy(Paciente $paciente)
    {
        $this->authorizePaciente($paciente);

        $id = $paciente->id;
        $paciente->delete();

        Log::warning('Paciente excluído (API)', ['user_id' => Auth::id(), 'paciente_id' => $id]);

        return response()->json(null, 204);
    }

    private function authorizePaciente(Paciente $paciente): void
    {
        if ($paciente->user_id !== Auth::id()) {
            abort(403, 'Acesso não autorizado.');
        }
    }
}
