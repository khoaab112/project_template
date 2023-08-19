<?php

namespace App\Repositories\BlogCategory;

use App\Repositories\BaseRepository;
use App\Models\BlogCategory;

/**
 * Class BlogCategoryRepository
 * @package App\Repositories\BlogCategory
 */
class BlogCategoryRepositoryEloquent extends BaseRepository implements BlogCategoryRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return BlogCategory::class;
    }
}
