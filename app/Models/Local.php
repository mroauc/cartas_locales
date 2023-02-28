<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Local
 * @package App\Models
 * @version February 25, 2023, 10:52 pm UTC
 *
 * @property string $nombre
 * @property string $logo_img
 */
class Local extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'locals';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'logo_img'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'logo_img' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required'
    ];

    
}
