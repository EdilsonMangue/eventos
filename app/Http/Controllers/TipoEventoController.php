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

            return redirect()->route('tipoevento.index');
        } catch (\Throwable $th) {
            return $th->getMessage();
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

            return redirect()->route('tipoevento.index');
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
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

            return redirect()->route('tipoevento.index');
        } catch (\Throwable $th) {
            //throw $th;

            return $th->getMessage();
        }
    }
}
