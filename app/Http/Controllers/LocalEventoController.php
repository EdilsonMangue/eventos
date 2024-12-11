<?php

namespace App\Http\Controllers;

use App\Models\LocalEvento;
use Illuminate\Http\Request;

class LocalEventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $local = new LocalEvento();
            $local->name = $request->name;
            $local->endereco = $request->endereco;
            $local->capacidade = $request->capacidade;
            $local->save();
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            //code...
            $local = LocalEvento::find($id);


        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            //code...
            $local = LocalEvento::find($id);
            $local->name = $request->name;
            $local->endereco = $request->endereco;
            $local->capacidade = $request->capacidade;
            $local->save();

        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            //code...
            $local = LocalEvento::find($id);
            $local->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }
}
