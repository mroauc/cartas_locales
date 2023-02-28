<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Carta
 * @package App\Models
 * @version February 25, 2023, 11:14 pm UTC
 *
 * @property string $nombre
 */
class Carta extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'cartas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'id_local'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required'
    ];

    public function productos()
    {
        return $this->belongsToMany(\App\Models\Producto::class, 'productos_cartas', 'id_carta', 'id_producto');
    }

    
}
