<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class residuo extends Model
{
    use HasFactory;
    protected $primaryKey='id_residuo';
    protected $fillable = ['fk_tipo','cantidad','porcentaje'];
    public function tipo_residuo()
    {
        return $this->belongsTo(tipo_residuo::class, 'fk_tipo');
    }
}

