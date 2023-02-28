<?php

namespace App\Repositories;

use App\Models\Local;
use App\Repositories\BaseRepository;

/**
 * Class LocalRepository
 * @package App\Repositories
 * @version February 25, 2023, 10:52 pm UTC
*/

class LocalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'logo_img'
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
        return Local::class;
    }
}
