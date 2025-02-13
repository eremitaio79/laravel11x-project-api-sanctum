<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Services\ApiResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource. (Listar clientes)
     */
    public function index()
    {
        // Retorna todos os clientes.
        // Return all clients in the database.
        // return response()->json(
        //     Client::all(),
        //     200
        // );
        return ApiResponse::success(Client::all());
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

        /**
         * Criação do cliente.
         * Todos os dados do cliente são passados via request.
         */

        $client = Client::create($request->all());

        return ApiResponse::success($client);
        // return response()->json(
        //     [
        //         'message' => 'Cliente criado com sucesso!',
        //         'data' => $client,
        //     ], 200
        // );
    }


    /**
     * Display the specified resource. (Exibir detalhes do cliente)
     */
    public function show(string $id)
    {
        // $client = Client::find($id);

        try {
            $client = Client::findOrFail($id);
            // return response()->json($client, 200);
            return ApiResponse::success($client, 200);
        } catch (\Exception $e) {
            // return response()->json(
            //     [
            //         'message' => 'Cliente não encontrado!',
            //     ],
            //     404
            // );
            return ApiResponse::error('Cliente não encontrado!', 404);
        }
    }


    /**
     * Update the specified resource in storage. (Atualizar dados do cliente)
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:clients,email,' . $id,
            'phone' => 'required|string',
        ]);

        // Update de client data in the database.
        $client = Client::find($id);

        if ($client) {
            $client->update($request->all());
            // return response()->json(
            //     [
            //         'message' => 'Cliente atualizado com sucesso!', // Mensagem de sucesso.
            //         'data' => $client, // Retorna os dados do cliente atualizados.
            //     ],
            //     200 // Status code 200 (OK).
            // );
            return ApiResponse::success($client);
        } else {
            // return response()->json(
            //     [
            //         'message' => 'Cliente não encontrado!', // Mensagem de erro.
            //     ],
            //     404 // Status code 404 (Not Found).
            // );
            return ApiResponse::error('Cliente não encontrado!', 404);
        }
    }


    /**
     * Remove the specified resource from storage. (Remover cliente)
     */
    public function destroy(string $id)
    {
        // Delete client from the database.
        $client = Client::find($id);

        if ($client) {
            $client->delete();
            // return response()->json(
            //     [
            //         'message' => 'Cliente removido com sucesso!', // Mensagem de sucesso.
            //     ],
            //     200 // Status code 200 (OK).
            // );
            return ApiResponse::success('Cliente removido com sucesso!');
        } else {
            // return response()->json(
            //     [
            //         'message' => 'Cliente não encontrado!', // Mensagem de erro.
            //     ],
            //     404 // Status code 404 (Not Found).
            // );
            return ApiResponse::error('Cliente não encontrado!', 404);
        }
    }
}
