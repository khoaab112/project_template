<?php

namespace App\Repositories\ProductVariant;

use App\Repositories\BaseRepository;
use App\Models\ProductVariant;

/**
 * Class ProductVariantRepository
 * @package App\Repositories\ProductVariant
 */
class ProductVariantRepositoryEloquent extends BaseRepository implements ProductVariantRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return ProductVariant::class;
    }
}
