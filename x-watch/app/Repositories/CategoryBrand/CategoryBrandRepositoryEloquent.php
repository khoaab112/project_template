<?php

namespace App\Repositories\CategoryBrand;

use App\Repositories\BaseRepository;
use App\Models\CategoryBrand;

/**
 * Class CategoryBrandRepository
 * @package App\Repositories\CategoryBrand
 */
class CategoryBrandRepositoryEloquent extends BaseRepository implements CategoryBrandRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return CategoryBrand::class;
    }
}
