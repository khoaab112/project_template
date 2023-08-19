<?php

namespace App\Repositories\ProductAttributeValueImage;

use App\Repositories\BaseRepository;
use App\Models\ProductAttributeValueImage;

/**
 * Class ProductAttributeValueImageRepository
 * @package App\Repositories\ProductAttributeValueImage
 */
class ProductAttributeValueImageRepositoryEloquent extends BaseRepository implements ProductAttributeValueImageRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return ProductAttributeValueImage::class;
    }
}
