<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::with(['user'])->orderBy('id', 'DESC')->paginate(10);

        //return $clientes;

        return view('cliente.index', ['clientes'=>$clientes]);
    }

    public function create()
    {
        return view('cliente.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password =  Hash::make($request->password);
            $user->permission = "cliente";

            $user->save();

            $client  = new Cliente();

            $client->name = $request->name;
            $client->user_id = $user->id;

            $client->save();

            return redirect()->route('cliente.index')->with('success', 'Cliente criado com sucesso!');
       } catch (\Throwable $th) {
           
           return redirect()->route('cliente.index')->with('error','Falha ao criar cliente');
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = Cliente::find($id);
        $user = User::find($cliente->user_id);

       // return $cliente;
        return view('cliente.editar', ['cliente'=> $cliente, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        try {
            $cliente = Cliente::find($id);

            $cliente->name = $request->name;
            $cliente->endereco = $request->endereco;
            $cliente->telephone = $request->telefone;
            
            $cliente->update();

            $user = User::find($cliente->user_id);
            $user->name = $request->name;

            $user->update();

            return redirect()->route('cliente.index')->with('update','Cliente atualizado com sucesso!');
        } catch (\Throwable $th) {
           return redirect()->route('cliente.index')->with('error','Falha ao atualizar cliente.');  
             }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $tipo = Cliente::find($request->id);
            $tipo->delete();

            return redirect()->route('cliente.index')->with('delete', 'Cliente apagado com sucesso!');
        } catch (\Throwable $th) {
            //throw $th;

            return redirect()->route('cliente.index')->with('error', 'Falha ao apagar cliente.');
        }
    }
}
