<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     * Lista todos os pedidos do usuário autenticado.
     */
    public function index()
    {
        // Retorna apenas os pedidos que pertencem ao usuário logado, com paginação
        $pedidos = Pedido::where('user_id', Auth::id())->paginate(10);
        
        return response()->json($pedidos);
    }

    /**
     * Store a newly created resource in storage.
     * Salva um novo pedido no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validator = Validator::make($request->all(), [
            'valor_total' => 'required|numeric|min:0',
            'detalhes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400); // Bad Request
        }

        // Adiciona o ID do usuário autenticado aos dados validados
        $dados = $validator->validated();
        $dados['user_id'] = Auth::id();

        // Cria o pedido
        $pedido = Pedido::create($dados);

        // Retorna o pedido criado com o status 201 (Created)
        return response()->json($pedido, 201);
    }

    /**
     * Display the specified resource.
     * Mostra um pedido específico.
     */
    public function show(Pedido $pedido)
    {
        // Verifica se o pedido pertence ao usuário autenticado
        if (Auth::id() !== $pedido->user_id) {
            return response()->json(['error' => 'Acesso não autorizado.'], 403); // Forbidden
        }

        return response()->json($pedido);
    }

    /**
     * Update the specified resource in storage.
     * Atualiza um pedido existente.
     */
    public function update(Request $request, Pedido $pedido)
    {
        // Verifica se o pedido pertence ao usuário autenticado
        if (Auth::id() !== $pedido->user_id) {
            return response()->json(['error' => 'Acesso não autorizado.'], 403); // Forbidden
        }

        // Validação dos dados (usando 'sometimes' para campos opcionais na atualização)
        $validator = Validator::make($request->all(), [
            'valor_total' => 'sometimes|required|numeric|min:0',
            'status' => 'sometimes|required|in:pendente,pago,enviado,cancelado',
            'detalhes' => 'sometimes|nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400); // Bad Request
        }

        // Atualiza o pedido com os dados validados
        $pedido->update($validator->validated());

        return response()->json($pedido);
    }

    /**
     * Remove the specified resource from storage.
     * Deleta um pedido.
     */
    public function destroy(Pedido $pedido)
    {
        // Verifica se o pedido pertence ao usuário autenticado
        if (Auth::id() !== $pedido->user_id) {
            return response()->json(['error' => 'Acesso não autorizado.'], 403); // Forbidden
        }

        $pedido->delete();

        // Retorna uma resposta vazia com status 204 (No Content)
        return response()->json(null, 204);
    }
}