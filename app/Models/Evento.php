<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    public function tipo()
    {
        return $this->belongsTo(TipoEvento::class, 'tipo_evento_id');
    }
}
