<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Resources\ClienteResource;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cliente = Cliente::all();
        return ClienteResource::collection($cliente) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $cliente = Cliente::create($data);

        return new ClienteResource($cliente);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $codigo)
    {
        $cliente = Cliente::where('codigo', '=' ,$codigo)->firstOrFail();
        return new ClienteResource($cliente);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $codigo)
    {
        $data = $request->all();
        $cliente = Cliente::where('codigo', '=' ,$codigo)->firstOrFail();
        $cliente->update($data);

        return new ClienteResource($cliente);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $codigo)
    {
        $cliente = Cliente::where('codigo', '=' ,$codigo)->firstOrFail();
        $cliente->delete();

        return response()->json(['message' => 'Cliente deletado'],204);
    }
}
