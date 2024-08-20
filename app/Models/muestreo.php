<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class muestreo extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_muestreo';
    protected $fillable = ['num_muestreo','zona','dia','año','fecha','fk_playa',];
    public function playa()
    {
        return $this->belongsTo(Playa::class, 'fk_playa');
    }

    
}
