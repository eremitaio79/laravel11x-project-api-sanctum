<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource. (Listar clientes)
     */
    public function index()
    {
        // Retorna todos os clientes.
        return response()->json(
            Client::all(),
            200
        );
    }

    /**
     * Store a newly created resource in storage. (Inserir novo cliente)
     */
    public function store(Request $request)
    {
        // Validação dos dados do cliente.
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:clients',
            'phone' => 'required|string',
        ]);

        // Criação do cliente.
        $client = Client::create($request->all());

        return response()->json(
            [
                'message' => 'Cliente criado com sucesso!',
                'data' => $client,
            ], 200
        );
    }

    /**
     * Display the specified resource. (Exibir detalhes do cliente)
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage. (Atualizar dados do cliente)
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage. (Remover cliente)
     */
    public function destroy(string $id)
    {
        //
    }
}
