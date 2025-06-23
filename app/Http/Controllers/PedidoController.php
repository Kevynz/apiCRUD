<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Mostra a lista de todos os pedidos.
     */
    public function index()
    {
        // Pega os pedidos mais recentes, já com os dados do usuário associado, e pagina
        $pedidos = Pedido::with('user')->latest()->paginate(10); 
        
        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Mostra o formulário para criar um novo pedido.
     */
    public function create()
    {
        // Pega todos os usuários para que possamos escolher um cliente no formulário
        $users = User::orderBy('name')->get();
        return view('pedidos.create', compact('users'));
    }

    /**
     * Salva um novo pedido no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'valor_total' => 'required|numeric|min:0',
            'status' => 'required|in:pendente,pago,enviado,cancelado',
            'detalhes' => 'nullable|string',
        ]);

        // Cria o pedido com os dados validados
        Pedido::create($request->all());

        // Redireciona para a lista de pedidos com uma mensagem de sucesso
        return redirect()->route('pedidos.index')
                         ->with('success', 'Pedido registrado com sucesso!');
    }

    /**
     * Mostra os detalhes de um pedido específico.
     * Usamos Route Model Binding (Pedido $pedido) para o Laravel encontrar o pedido sozinho.
     */
    public function show(Pedido $pedido)
    {
        return view('pedidos.show', compact('pedido'));
    }

    /**
     * Mostra o formulário para editar um pedido existente.
     */
    public function edit(Pedido $pedido)
    {
        $users = User::orderBy('name')->get();
        return view('pedidos.edit', compact('pedido', 'users'));
    }

    /**
     * Atualiza um pedido existente no banco de dados.
     */
    public function update(Request $request, Pedido $pedido)
    {
        // Validação dos dados
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'valor_total' => 'required|numeric|min:0',
            'status' => 'required|in:pendente,pago,enviado,cancelado',
            'detalhes' => 'nullable|string',
        ]);

        // Atualiza o pedido
        $pedido->update($request->all());

        // Redireciona de volta para a lista com mensagem de sucesso
        return redirect()->route('pedidos.index')
                         ->with('success', 'Pedido atualizado com sucesso!');
    }

    /**
     * Remove um pedido do banco de dados.
     */
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();

        return redirect()->route('pedidos.index')
                         ->with('success', 'Pedido excluído com sucesso!');
    }
}