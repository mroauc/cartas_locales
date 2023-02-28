<?php

namespace App\Repositories;

use App\Models\Carta;
use App\Repositories\BaseRepository;

/**
 * Class CartaRepository
 * @package App\Repositories
 * @version February 25, 2023, 11:14 pm UTC
*/

class CartaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
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
        return Carta::class;
    }
}
