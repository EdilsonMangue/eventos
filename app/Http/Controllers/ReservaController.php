<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\ItemReserva;
use App\Models\Pacote;
use App\Models\Pagamento;
use App\Models\Reserva;
use App\Models\Servico;
use App\Models\TipoEvento;
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
            $reserva =  Reserva::with(['itens.servico', 'cliente'])->orderBy('id','DESC')->paginate(15);
           // return $reserva;
            return view('reserva.index', ['reservas' => $reserva]);
        } catch (\Throwable $th) {
            //throw $th;

            $th->getMessage();
        }
    }

    public function reserva_cliente()
    {
       
        try {
            $cliente = Cliente::where('user_id', Auth::user()->id)->get();
            $reserva =  Reserva::with(['itens.servico', 'cliente', 'tipoevento'])
            ->where('cliente_id',  $cliente[0]->id)->orderBy('id','DESC')->paginate(15);
           // return $reserva;
            return view('userCliente.index_reserva', ['reservas' => $reserva]);
        } catch (\Throwable $th) {
           

        } 
    }

    public function create()
    {

        try {

            // $pacote = Pacote::with('servicos')->get();
            $servico = Servico::get();
            $clientes = Cliente::get();
            $tipos = TipoEvento::all();
            return view('reserva.create', ['servicos' => $servico, 'clientes' => $clientes, 'tipos' => $tipos]);
        } catch (\Throwable $th) {
            //throw $th;
            $th->getMessage();
        }
    }

    public function reserva_create()
    {
        
        try {

            $servico = Servico::get();
            $tipos = TipoEvento::all();
            return view('userCliente.create_reserva', ['servicos' => $servico,'tipos' => $tipos]);
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
             $reserva->data_inicio = $request->data_inicio;
             $reserva->data_fim = $request->data_fim;
             $reserva->hora_inicio =  $request->hora_inicio;
             $reserva->hora_fim = $request->hora_fim;
             $reserva->reserva_no = "RLA/".$request->cliente."/".($last->id + 1);
             $reserva->tipo_evento_id = $request->tipo_evento;
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
            
            

           

            return redirect()->route('reserva.index')->with('success', 'Reserva criada com sucesso!');;
        } catch (\Throwable $th) {
            //throw $th;

            return redirect()->route('reserva.index')->with('error','Falha ao criar reserva');
        }
    }


    public function reserva_store(Request $request)
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
             $cliente = Cliente::where('user_id', Auth::user()->id)->get();
            //  return $cliente[0]->id;
             $reserva = new Reserva();
             $reserva->cliente_id =$cliente[0]->id;
             $reserva->user_id = Auth::user()->id;
             $reserva->status = 'pendente';
             $reserva->total = $total;
             $reserva->data_inicio = $request->data_inicio;
             $reserva->data_fim = $request->data_fim;
             $reserva->hora_inicio =  $request->hora_inicio;
             $reserva->hora_fim = $request->hora_fim;
             $reserva->reserva_no = "RLA/".$cliente[0]->id."/".($last->id + 1);
             $reserva->tipo_evento_id = $request->tipo_evento;
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
            
            

           

            return redirect()->route('reserva.cliente')->with('success','sucesso');
        } catch (\Throwable $th) {
            //throw $th;

            return redirect()->route('reserva.cliente')->with('error','erro');
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


    public function detalhe_cliente(string $id)
    {
        try {
            //code...
            $reserva =  Reserva::with(['itens.servico', 'cliente'])->find($id);

           // return $reserva;
           return view('userCliente.detalhe_reserva', ['reservas' => $reserva]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }
    public function edit(string $id)
    {
        $reserva =  Reserva::with(['itens.servico', 'cliente'])->find($id);

        $servico = Servico::get();
        $clientes = Cliente::get();

        return view('reserva.editar', ['reserva' => $reserva, 'servicos' => $servico, 'clientes' => $clientes]);
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
                // $reserva->status =  $request->status;
                 $reserva->total = $total;
                 $reserva->data_inicio = $request->data_inicio;
                 $reserva->data_fim = $request->data_fim;
                 $reserva->hora_inicio =  $request->hora_inicio;
                 $reserva->hora_fim = $request->hora_fim;
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
                
                
    
               
    
                return redirect()->route('reserva.index')->with('update','Reserva atualizado com sucesso!');
        } catch (\Throwable $th) {
           return  redirect()->route('reserva.index')->with('error','Falha ao atualizar Reserva.');;
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

             return redirect()->route('reserva.index')->with('update','Pagamento feito com sucesso!');;

        } catch (\Throwable $th) {
           return redirect()->route('reserva.index')->with('error','Falha ao pagamento.');
        }
    }
}
