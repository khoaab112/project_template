<?php

namespace App\Repositories\ProductFlashSale;

use App\Repositories\BaseRepository;
use App\Models\ProductFlashSale;

/**
 * Class ProductFlashSaleRepository
 * @package App\Repositories\ProductFlashSale
 */
class ProductFlashSaleRepositoryEloquent extends BaseRepository implements ProductFlashSaleRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return ProductFlashSale::class;
    }
}
