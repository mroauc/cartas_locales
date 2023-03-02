<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Producto
 * @package App\Models
 * @version February 26, 2023, 3:05 pm UTC
 *
 * @property string $nombre
 * @property string $descripcion
 * @property integer $precio
 * @property boolean $disponible
 * @property integer $stock
 */
class Producto extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'productos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'disponible',
        'stock',
        'id_local',
        'id_categoria',
        'id_producto_padre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'descripcion' => 'string',
        'precio' => 'integer',
        'disponible' => 'boolean',
        'stock' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'precio' => 'required'
    ];

    public function cartas()
    {
        return $this->belongsToMany(\App\Models\Carta::class, 'productos_cartas', 'id_producto', 'id_carta');
    }

    public function producto_padre(){
        return $this->belongsTo('App\Models\Producto', 'id_producto_padre' );
    }

    public function productos_hijos(){  
        return $this->hasMany('App\Models\Producto', 'id_producto_padre');
    }
}
