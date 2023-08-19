<?php

namespace App\Repositories\ProductImage;

use App\Repositories\BaseRepository;
use App\Models\ProductImage;

/**
 * Class ProductImageRepository
 * @package App\Repositories\ProductImage
 */
class ProductImageRepositoryEloquent extends BaseRepository implements ProductImageRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return ProductImage::class;
    }
}
