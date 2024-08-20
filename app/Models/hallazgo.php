<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hallazgo extends Model
{
    use HasFactory;
    protected $fillable=['fk_muestreo','fk_residuos','fk_capturista'];

    public function muestreo()
    {
        return $this->belongsTo(muestreo::class, 'fk_muestreo');
    }
    public function residuo()
    {
        return $this->belongsTo(residuo::class, 'fk_residuos');
    }
    public function capturista()
    {
        return $this->belongsTo(User::class, 'fk_capturista');
    }

}
