<?php

namespace App\Repositories\CategoryAttributeFilter;

use App\Repositories\BaseRepository;
use App\Models\CategoryAttributeFilter;

/**
 * Class CategoryAttributeFilterRepository
 * @package App\Repositories\CategoryAttributeFilter
 */
class CategoryAttributeFilterRepositoryEloquent extends BaseRepository implements CategoryAttributeFilterRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return CategoryAttributeFilter::class;
    }
}
