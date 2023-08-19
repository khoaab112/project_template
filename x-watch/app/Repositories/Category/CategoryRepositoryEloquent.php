<?php

namespace App\Repositories\Category;

use App\Repositories\BaseRepository;
use App\Models\Category;

/**
 * Class CategoryRepository
 * @package App\Repositories\Category
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Category::class;
    }
}
