<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = "reservas";

    public function itens()
    {
        return $this->hasMany(ItemReserva::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function tipoevento()
    {
        return $this->belongsTo(TipoEvento::class, 'tipo_evento_id');
    }
}
