<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Http\Resources\EmpresaResource;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::all();
        return EmpresaResource::collection($empresas) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $empresa = Empresa::create($data);

        return new EmpresaResource($empresa);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $codigo)
    {
        $empresa = Empresa::where('codigo', '=' ,$codigo)->firstOrFail();
        return new EmpresaResource($empresa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $codigo)
    {
        $data = $request->all();
        $empresa = Empresa::where('codigo', '=' ,$codigo)->firstOrFail();
        $empresa->update($data);

        return new EmpresaResource($empresa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $codigo)
    {
        $empresa = Empresa::where('codigo', '=' ,$codigo)->firstOrFail();
        $empresa->delete();

        return response()->json(['message' => 'Empresa deletada'],204);
    }
}
