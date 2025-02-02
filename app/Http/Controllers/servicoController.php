<?php

namespace App\Http\Controllers;

use App\Models\Pacote;
use App\Models\Servico;
use Illuminate\Http\Request;

class servicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $servicos = Servico::get();

            return view('servico.index', ['servicos' => $servicos]);
        } catch (\Throwable $th) {
            //throw $th;

            return $th->getMessage();
        }
    }

    public function servivos_cliente()
    {
        try {
            $servicos = Servico::get();

            return view('userCliente.servicos', ['servicos' => $servicos]);
        } catch (\Throwable $th) {
            //throw $th;

            return $th->getMessage();
        }
    }

    public function create()
    {
        try {
            //code...
           

            return view('servico.create');
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
            $servico = new Servico();
            $servico->name = $request->name;
            // $servico->pacote_id = $request->pacote;
            $servico->preco = $request->preco;
            $servico->save();
            return redirect()->route('servico.index')->with('success', 'serviço criado com sucesso!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('servico.index')->with('error','Falha ao criar serviço');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {
            //code...
            $servico = Servico::find($id);

            return view('servico.editar', ['servico' => $servico]);

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
        //
        try {
            $servico = Servico::find($id);

            $servico->name = $request->name;
            // $servico->pacote_id = $request->pacote;
            $servico->preco = $request->preco;
            $servico->update();
            return redirect()->route('servico.index')->with('update','Serviço atualizado com sucesso!');

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('servico.index')->with('error','Falha ao atualizar Serviço.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //

        try {
            //code...
            $servico = Servico::find($request->id);
            $servico->delete();
            return redirect()->route('servico.index')->with('delete', 'Serviço apagado com sucesso!');
        } catch (\Throwable $th) {
            //throw $th;

            return redirect()->route('servico.index')->with('error', 'Falha ao apagar serviço.');
        }
    }
}
