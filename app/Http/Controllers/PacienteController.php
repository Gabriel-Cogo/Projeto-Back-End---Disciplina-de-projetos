<?php

namespace App\Http\Controllers; // << AQUI! (não é Api)

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::where('user_id', Auth::id())
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'cpf'  => ['required', 'string', 'max:14', 'unique:pacientes,cpf'],
        ]);

        $data['cpf'] = preg_replace('/\D+/', '', $data['cpf']);

        $paciente = Paciente::create([
            'nome'    => $data['nome'],
            'cpf'     => $data['cpf'],
            'user_id' => Auth::id(),
        ]);

        Log::info('Paciente criado (WEB)', ['user_id' => Auth::id(), 'paciente_id' => $paciente->id]);

        return redirect()->route('pacientes.index')->with('success', 'Paciente cadastrado com sucesso!');
    }

    public function edit(Paciente $paciente)
    {
        $this->authorizePaciente($paciente);
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, Paciente $paciente)
    {
        $this->authorizePaciente($paciente);

        $data = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'cpf'  => ['required', 'string', 'max:14', 'unique:pacientes,cpf,' . $paciente->id],
        ]);

        $data['cpf'] = preg_replace('/\D+/', '', $data['cpf']);

        $paciente->update($data);

        Log::info('Paciente atualizado (WEB)', ['user_id' => Auth::id(), 'paciente_id' => $paciente->id]);

        return redirect()->route('pacientes.index')->with('success', 'Paciente atualizado com sucesso!');
    }

    public function destroy(Paciente $paciente)
    {
        $this->authorizePaciente($paciente);

        $id = $paciente->id;
        $paciente->delete();

        Log::warning('Paciente excluído (WEB)', ['user_id' => Auth::id(), 'paciente_id' => $id]);

        return redirect()->route('pacientes.index')->with('success', 'Paciente removido com sucesso!');
    }

    private function authorizePaciente(Paciente $paciente): void
    {
        if ($paciente->user_id !== Auth::id()) {
            abort(403, 'Acesso não autorizado.');
        }
    }
}
