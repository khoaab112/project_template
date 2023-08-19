<?php

namespace App\Repositories\Brand;

use App\Repositories\BaseRepository;
use App\Models\Brand;

/**
 * Class BrandRepository
 * @package App\Repositories\Brand
 */
class BrandRepositoryEloquent extends BaseRepository implements BrandRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Brand::class;
    }
}
