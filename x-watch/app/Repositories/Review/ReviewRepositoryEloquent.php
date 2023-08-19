<?php

namespace App\Repositories\Review;

use App\Repositories\BaseRepository;
use App\Models\Review;

/**
 * Class ReviewRepository
 * @package App\Repositories\Review
 */
class ReviewRepositoryEloquent extends BaseRepository implements ReviewRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Review::class;
    }
}
