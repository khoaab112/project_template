<?php

namespace App\Repositories\Attribute;

use App\Repositories\BaseRepository;
use App\Models\Attribute;

/**
 * Class AttributeRepository
 * @package App\Repositories\Attribute
 */
class AttributeRepositoryEloquent extends BaseRepository implements AttributeRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Attribute::class;
    }
}
