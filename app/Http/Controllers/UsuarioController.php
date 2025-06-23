<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UsuarioController extends Controller
{

    public function index()
    {
        $usuarios = User::latest()->paginate(10);
        return view('usuarios.index', compact('usuarios'));
    }


    public function create()
    {
        return view('usuarios.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('usuarios.index')
                         ->with('success', 'Usuário cadastrado com sucesso!');
    }


    public function show(User $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }


    public function edit(User $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }


    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$usuario->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        $dados = $request->except('password');
        if ($request->filled('password')) {
            $dados['password'] = Hash::make($request->password);
        }

        $usuario->update($dados);

        return redirect()->route('usuarios.index')
                         ->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy(User $usuario)
    {
        // Impede que o usuário se auto-delete
        if (auth()->id() == $usuario->id) {
            return redirect()->route('usuarios.index')
                             ->with('error', 'Você não pode excluir seu próprio usuário!');
        }
        
        $usuario->delete();

        return redirect()->route('usuarios.index')
                         ->with('success', 'Usuário excluído com sucesso!');
    }
}