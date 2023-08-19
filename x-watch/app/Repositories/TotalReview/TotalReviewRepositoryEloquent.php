<?php

namespace App\Repositories\TotalReview;

use App\Repositories\BaseRepository;
use App\Models\TotalReview;

/**
 * Class TotalReviewRepository
 * @package App\Repositories\TotalReview
 */
class TotalReviewRepositoryEloquent extends BaseRepository implements TotalReviewRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return TotalReview::class;
    }
}
