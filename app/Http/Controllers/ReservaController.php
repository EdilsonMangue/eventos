<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\ItemReserva;
use App\Models\Pacote;
use App\Models\Pagamento;
use App\Models\Reserva;
use App\Models\Servico;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $reserva =  Reserva::with(['itens.servico', 'cliente'])->get();
           // return $reserva;
            return view('reserva.index', ['reservas' => $reserva]);
        } catch (\Throwable $th) {
            //throw $th;

            $th->getMessage();
        }
    }

    public function create()
    {

        try {

            $pacote = Pacote::with('servicos')->get();
            $clientes = Cliente::get();
            return view('reserva.create', ['pacotes' => $pacote, 'clientes' => $clientes]);
        } catch (\Throwable $th) {
            //throw $th;
            $th->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            // return $request->all();
            $qty = array_map(function ($value) {
                return $value === null ? 0 : $value;
            }, $request->qty);

            $total = 0;
            foreach($request->servicos as $index => $servicoId){

                if ($qty[$index] > 0) {
                $servico = Servico::find($servicoId);

                $total_item =  $servico->preco * $qty[$index];

                $total += $total_item;
                }

             }
           
             $last = Reserva::orderBy('id', 'DESC')->first();

             $reserva = new Reserva();
             $reserva->cliente_id = $request->cliente;
             $reserva->user_id = Auth::user()->id;
             $reserva->status = 'pendente';
             $reserva->total = $total;
             $reserva->reserva_no = "RLA/".$request->cliente."/".($last->id + 1);
             $reserva->save();

             
             $total_item = 0;
             foreach ($request->servicos as $index => $servicoId) {
                if ($qty[$index] > 0) {
                    $item = new ItemReserva();
            
                    $item->reserva_id = $reserva->id;
                    $item->servico_id = $servicoId;
                    $item->quantidade = $qty[$index];
            
                    $item->save();
                }
            }
            
            

           

            return redirect()->route('reserva.index');
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
            $reserva =  Reserva::with(['itens.servico', 'cliente'])->find($id);

            return response()->json($reserva);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function detalhe(string $id)
    {
        try {
            //code...
            $reserva =  Reserva::with(['itens.servico', 'cliente'])->find($id);

           // return $reserva;
           return view('reserva.detalhes', ['reservas' => $reserva]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function edit(string $id)
    {
        $reserva =  Reserva::with(['itens.servico', 'cliente'])->find($id);

        $pacote = Pacote::with('servicos')->get();
        $clientes = Cliente::get();

        return view('reserva.editar', ['reserva' => $reserva, 'pacotes' => $pacote, 'clientes' => $clientes]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

                // return $request->all();
                $qty = array_map(function ($value) {
                    return $value === null ? 0 : $value;
                }, $request->qty);
    
                $total = 0;
                foreach($request->servicos as $index => $servicoId){
    
                    if ($qty[$index] > 0) {
                    $servico = Servico::find($servicoId);
    
                    $total_item =  $servico->preco * $qty[$index];
    
                    $total += $total_item;
                    }
    
                 }
            
    
                 $reserva =  Reserva::find($id);
                 $reserva->cliente_id = $request->cliente;
                // $reserva->user_id = Auth::user()->id;
                 $reserva->status = 'pendente';
                 $reserva->total = $total;
                 $reserva->save();
    
                 
                 $total_item = 0;

                 $item =  ItemReserva::where('reserva_id', '=', $reserva->id)->get();
                 foreach($item as $value)
                 {
                    $value->delete();
                 }
                 foreach ($request->servicos as $index => $servicoId) {
                    if ($qty[$index] > 0) {
                        $item = new  ItemReserva();
                
                        $item->reserva_id = $reserva->id;
                        $item->servico_id = $servicoId;
                        $item->quantidade = $qty[$index];
                
                        $item->save();
                    }
                }
                
                
    
               
    
                return redirect()->route('reserva.index');
        } catch (\Throwable $th) {
           return $th->getMessage();
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function payment(Request $request)
    {
        try {
            //return $request->all();
            
             $reserva = Reserva::find($request->id);
             $reserva->status = $request->status;
             $reserva->update();

             $pagamento = new Pagamento();
             $pagamento->cliente_id = $request->cliente_id;
             $pagamento->reserva_id = $request->id;
             $pagamento->valor = $request->total;
             $pagamento->save();

             return redirect()->route('reserva.index');

        } catch (\Throwable $th) {
           return $th->getMessage();
        }
    }
}