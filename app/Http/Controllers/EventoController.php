<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\TipoEvento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
             $evento  = Evento::with('tipo')->orderBy('id','DESC')->paginate(15);

             //return $evento;
             return view('evento.index', ['eventos' => $evento]);
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }

    public function create()
    {
        try {
            $tipos = TipoEvento::all();
            return view('evento.create', ['tipos' => $tipos]);
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        try {
            //code...

            $evento = new Evento();
            $evento->name = $request->name;
            $evento->data_inicio = $request->data_inicio;
            $evento->data_fim = $request->data_fim;
            $evento->hora_inicio = $request->hora_inicio;
            $evento->hora_fim = $request->hora_fim;
            $evento->local_evento = 1;
            $evento->tipo_evento_id = $request->tipo_evento;
            $evento->save();

            return redirect()->route('evento.index');
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
        //
        try {
            $evento  = Evento::find($id);

            $tipos = TipoEvento::all();
            return view('evento.editar', ['evento' => $evento, 'tipos' => $tipos]);
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
        
            $evento = Evento::find($id);
            $evento->name = $request->name;
            $evento->data_inicio = $request->data_inicio;
            $evento->data_fim = $request->data_fim;
            $evento->hora_inicio = $request->hora_inicio;
            $evento->hora_fim = $request->hora_fim;
            $evento->local_evento = $request->local;
            $evento->tipo_evento_id = $request->tipo_evento;
            $evento->update();

            return redirect()->route('evento.index');

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
