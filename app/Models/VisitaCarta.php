<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitaCarta extends Model
{
    use HasFactory;
    public $table = 'visitas_carta';

    public $fillable = [
        'visitas',
    ];
    
}
