<?php

namespace App\Repositories;

use App\Models\Categoria_producto;
use App\Repositories\BaseRepository;

/**
 * Class Categoria_productoRepository
 * @package App\Repositories
 * @version February 26, 2023, 3:44 pm UTC
*/

class Categoria_productoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'pos_carta'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Categoria_producto::class;
    }
}
