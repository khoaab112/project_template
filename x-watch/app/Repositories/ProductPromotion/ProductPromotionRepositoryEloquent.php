<?php

namespace App\Repositories\ProductPromotion;

use App\Repositories\BaseRepository;
use App\Models\ProductPromotion;

/**
 * Class ProductPromotionRepository
 * @package App\Repositories\ProductPromotion
 */
class ProductPromotionRepositoryEloquent extends BaseRepository implements ProductPromotionRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return ProductPromotion::class;
    }
}
