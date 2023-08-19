<?php

namespace App\Repositories\ProductDescription;

use App\Repositories\BaseRepository;
use App\Models\ProductDescription;

/**
 * Class ProductDescriptionRepository
 * @package App\Repositories\ProductDescription
 */
class ProductDescriptionRepositoryEloquent extends BaseRepository implements ProductDescriptionRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return ProductDescription::class;
    }
}
