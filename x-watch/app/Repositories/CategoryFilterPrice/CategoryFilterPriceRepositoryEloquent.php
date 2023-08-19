<?php

namespace App\Repositories\CategoryFilterPrice;

use App\Repositories\BaseRepository;
use App\Models\CategoryFilterPrice;

/**
 * Class CategoryFilterPriceRepository
 * @package App\Repositories\CategoryFilterPrice
 */
class CategoryFilterPriceRepositoryEloquent extends BaseRepository implements CategoryFilterPriceRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return CategoryFilterPrice::class;
    }
}
