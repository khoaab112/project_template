<?php

namespace App\Repositories\ProductManual;

use App\Repositories\BaseRepository;
use App\Models\ProductManual;

/**
 * Class ProductManualRepository
 * @package App\Repositories\ProductManual
 */
class ProductManualRepositoryEloquent extends BaseRepository implements ProductManualRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return ProductManual::class;
    }
}
