<?php

namespace App\Repositories\CategoryAttributeValueFilters;

use App\Repositories\BaseRepository;
use App\Models\CategoryAttributeValueFilters;

/**
 * Class CategoryAttributeValueFiltersRepository
 * @package App\Repositories\CategoryAttributeValueFilters
 */
class CategoryAttributeValueFiltersRepositoryEloquent extends BaseRepository implements CategoryAttributeValueFiltersRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return CategoryAttributeValueFilters::class;
    }
}
