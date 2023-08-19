<?php

namespace App\Repositories\Product;

use App\Repositories\BaseRepository;
use App\Models\Product;

/**
 * Class ProductRepository
 * @package App\Repositories\Product
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Product::class;
    }
}
