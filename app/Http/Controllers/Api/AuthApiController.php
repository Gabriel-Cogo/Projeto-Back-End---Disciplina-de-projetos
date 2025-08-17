<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Sanctum\PersonalAccessToken;

class AuthApiController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'                  => ['required','string','max:255'],
            'email'                 => ['required','email','max:255','unique:users,email'],
            'password'              => ['required', Password::min(8)->letters()->numbers()],
            'password_confirmation' => ['required','same:password'],
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $token = $user->createToken('api-token')->plainTextToken;

        Log::info('Usuário registrado via API', ['user_id' => $user->id, 'email' => $user->email]);

        return response()->json([
            'message' => 'Usuário cadastrado com sucesso.',
            'token'   => $token,
            'user'    => [
                'id'    => $user->id,
                'name'  => $user->name,
                'email' => $user->email,
            ],
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required','email'],
            'password' => ['required','string'],
        ]);

        if (!Auth::attempt($credentials)) {
            Log::warning('Tentativa de login API falhou', ['email' => $request->email]);
            return response()->json(['message' => 'Credenciais inválidas.'], 401);
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // (Opcional) invalidar tokens anteriores com o mesmo nome
        $user->tokens()->where('name','api-token')->delete();

        $token = $user->createToken('api-token')->plainTextToken;

        Log::info('Login API bem-sucedido', ['user_id' => $user->id]);

        return response()->json([
            'token' => $token,
            'user'  => [
                'id'    => $user->id,
                'name'  => $user->name,
                'email' => $user->email,
            ],
        ]);
    }

    public function me(Request $request)
    {
        return response()->json($request->user());
    }

    public function logout(Request $request)
    {
        /** @var \App\Models\User|null $user */
        $user = $request->user();

        // --- Revogar apenas o token atual (logout do dispositivo/aba atual) ---
        /** @var PersonalAccessToken|null $token */
        $token = $user?->currentAccessToken(); // tipagem explícita para calar o Intelephense
        if ($token) {
            $token->delete();
        }

        // --- Alternativa: descomente para sair de TODOS os dispositivos/tokens ---
        // $user?->tokens()->delete();

        Log::info('Logout API', ['user_id' => $user?->id]);

        return response()->json(['message' => 'Token revogado.']);
    }
}
