<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Categoria_producto
 * @package App\Models
 * @version February 26, 2023, 3:44 pm UTC
 *
 * @property string $nombre
 * @property integer $pos_carta
 */
class Categoria_producto extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'categoria_productos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'pos_carta',
        'tipo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'pos_carta' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'pos_carta' => 'required'
    ];

    public function productos(){  
        return $this->hasMany('App\Models\Producto', 'id_categoria');
    }

    
}
