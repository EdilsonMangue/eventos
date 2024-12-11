<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $agenda = new Agenda();
            $agenda->funcionario_id = $request->funcionario;
            $agenda->evento_id = $request->evento;
            $agenda->save();

        } catch (\Throwable $th) {
           return $this->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $agenda = Agenda::find($id);

        } catch (\Throwable $th) {
           return $this->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $agenda = Agenda::find($id);
            $agenda->funcionario_id = $request->funcionario;
            $agenda->evento_id = $request->evento;
            $agenda->save();
        } catch (\Throwable $th) {
            return $this->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $agenda = Agenda::find($id);
            $agenda->delete();
        } catch (\Throwable $th) {
            return $this->getMessage();
        }
    }
}
