<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Evento;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = Evento::with(['tipo'])->orderBy('id', 'DESC')->paginate(1);
        $reserva =  Reserva::with(['itens.servico', 'cliente', 'tipoevento'])->orderBy('id','DESC')->paginate(15);
        $pagas = Reserva::where('status','pago')->get();
        $cancelada = Reserva::where('status','cancelado')->get();
        $pendente =  Reserva::where('status','pendente')->get();
        $reservas = Reserva::get();
        $clientes = Cliente::get();
        return view('Dashboard.dashboard', ['eventos' => $eventos, 'pagas' => $pagas, 'cancelada' => $cancelada, 'pendente' => $pendente, 'reservas' => $reservas, 'clientes' => $clientes, 'reservass' => $reserva]);
    }

    public function dashboard_cliente()
    {
        $cliente = Cliente::where('user_id', Auth::user()->id)->get();

        $reservas = Reserva::where('cliente_id', $cliente[0]->id)->get();
        $pagas = Reserva::where('cliente_id', $cliente[0]->id)
                            ->where('status','pago')->get();
        $cancelada = Reserva::where('cliente_id', $cliente[0]->id)
        ->where('status','cancelado')->get();
        $pendente = Reserva::where('cliente_id', $cliente[0]->id)
        ->where('status','pendente')->get();

        $reserva =  Reserva::with(['itens.servico', 'cliente', 'tipoevento'])
        ->where('cliente_id',  $cliente[0]->id)->orderBy('id','DESC')->paginate(15);
        return view('userCliente.dashboard', ['reservas' => $reservas, 'pagas' => $pagas, 'cancelada' => $cancelada, 'pendente' => $pendente, 'reservass' => $reserva]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
