<?php

namespace App\Repositories\Blog;

use App\Repositories\BaseRepository;
use App\Models\Blog;

/**
 * Class BlogRepository
 * @package App\Repositories\Blog
 */
class BlogRepositoryEloquent extends BaseRepository implements BlogRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Blog::class;
    }
}
