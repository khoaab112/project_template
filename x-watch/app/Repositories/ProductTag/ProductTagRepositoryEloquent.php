<?php

namespace App\Repositories\ProductTag;

use App\Repositories\BaseRepository;
use App\Models\ProductTag;

/**
 * Class ProductTagRepository
 * @package App\Repositories\ProductTag
 */
class ProductTagRepositoryEloquent extends BaseRepository implements ProductTagRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return ProductTag::class;
    }
}
