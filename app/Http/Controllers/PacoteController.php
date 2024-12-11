<?php

namespace App\Http\Controllers;

use App\Models\Pacote;
use Illuminate\Http\Request;

class PacoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $pacote = Pacote::get();

            return view('pacote.index', ['pacotes' => $pacote]);
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }

    public function create()
    {
        try {
            return view('pacote.create');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $pacote = new Pacote();

            $pacote->name = $request->name;

            $pacote->save();
            return redirect()->route('pacote.index');
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
            $pacote = Pacote::find($id);

            return view('pacote.editar', ['pacote' => $pacote]);
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
            $pacote = Pacote::find($request->id);
            $pacote->name = $request->name;
            $pacote->update();

            return redirect()->route('pacote.index');
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
            $pacote = Pacote::find($request->id);
            $pacote->delete();
            return redirect()->route('pacote.index');
        } catch (\Throwable $th) {
            //throw $th;

            return $th->getMessage();
        }
    }
}
