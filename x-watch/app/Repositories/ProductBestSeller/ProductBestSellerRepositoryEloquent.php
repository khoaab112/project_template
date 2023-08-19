<?php

namespace App\Repositories\ProductBestSeller;

use App\Repositories\BaseRepository;
use App\Models\ProductBestSeller;

/**
 * Class ProductBestSellerRepository
 * @package App\Repositories\ProductBestSeller
 */
class ProductBestSellerRepositoryEloquent extends BaseRepository implements ProductBestSellerRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return ProductBestSeller::class;
    }
}
