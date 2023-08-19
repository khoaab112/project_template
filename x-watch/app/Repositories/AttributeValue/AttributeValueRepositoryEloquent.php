<?php

namespace App\Repositories\AttributeValue;

use App\Repositories\BaseRepository;
use App\Models\AttributeValue;

/**
 * Class AttributeValueRepository
 * @package App\Repositories\AttributeValue
 */
class AttributeValueRepositoryEloquent extends BaseRepository implements AttributeValueRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return AttributeValue::class;
    }
}
