<?php

namespace App\Repositories\CategoryTag;

use App\Repositories\BaseRepository;
use App\Models\CategoryTag;

/**
 * Class CategoryTagRepository
 * @package App\Repositories\CategoryTag
 */
class CategoryTagRepositoryEloquent extends BaseRepository implements CategoryTagRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return CategoryTag::class;
    }
}
