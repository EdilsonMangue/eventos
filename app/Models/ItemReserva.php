<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemReserva extends Model
{
    use HasFactory;

    protected $table = "item_reservas";

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }
}
