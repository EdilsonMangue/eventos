<?php

namespace App\Http\Controllers;

use App\Models\TipoEvento;
use Illuminate\Http\Request;

class TipoEventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = TipoEvento::get();

        return view('Tipoevento.index', ['tipos' => $tipos]);
    }

    public function create()
    {
        return view('Tipoevento.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $tipo = new TipoEvento();
            $tipo->name = $request->name;
            $tipo->save();

            return redirect()->route('tipoevento.index')->with('success', 'Tipo de evento criado com sucesso!');
        } catch (\Throwable $th) {
            return   redirect()->route('tipoevento.index')->with('success', 'Falha ao criar o tipo de evento.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $tipo = TipoEvento::find($id);

            return view('Tipoevento.editar', ['tipo' => $tipo]);

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,)
    {
        try {
            $tipo = TipoEvento::find($request->id);
            $tipo->name = $request->name;
            $tipo->update();

            return redirect()->route('tipoevento.index')->with('update', 'Tipo de evento atualizado com sucesso!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('tipoevento.index')->with('errror', 'Falha ao atualizar o tipo de evento.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $tipo = TipoEvento::find($request->id);
            $tipo->delete();

            return redirect()->route('tipoevento.index')->with('delete', 'Tipo de evento apagado com sucesso!');
        } catch (\Throwable $th) {
            //throw $th;

            return redirect()->route('tipoevento.index')->with('error', 'Falha ao apagar o tipo de evento.');
        }
    }
}
