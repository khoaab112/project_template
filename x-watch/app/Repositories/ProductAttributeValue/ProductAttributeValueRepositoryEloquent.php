<?php

namespace App\Repositories\ProductAttributeValue;

use App\Repositories\BaseRepository;
use App\Models\ProductAttributeValue;

/**
 * Class ProductAttributeValueRepository
 * @package App\Repositories\ProductAttributeValue
 */
class ProductAttributeValueRepositoryEloquent extends BaseRepository implements ProductAttributeValueRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return ProductAttributeValue::class;
    }
}
