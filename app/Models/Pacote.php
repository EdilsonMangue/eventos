<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacote extends Model
{
    use HasFactory;

    protected $table = "pacotes";

    public function servicos()
    {
        return $this->hasMany(Servico::class);
    }
}
