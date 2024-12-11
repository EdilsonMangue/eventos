<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    //

    public function printReserva(string $id)
    {
        $reserva =  Reserva::with(['itens.servico', 'cliente'])->find($id);



        $pdf = Pdf::loadView('relatorio.reserva', [
            'data' => $reserva,
        ]);
        $pdf->setPaper('A4', 'portrait');

        // return $data;
        return $pdf->stream('billing.pdf');

    }
}
