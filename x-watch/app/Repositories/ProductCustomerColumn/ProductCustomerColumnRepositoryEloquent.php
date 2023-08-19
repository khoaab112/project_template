<?php

namespace App\Repositories\ProductCustomerColumn;

use App\Repositories\BaseRepository;
use App\Models\ProductCustomerColumn;

/**
 * Class ProductCustomerColumnRepository
 * @package App\Repositories\ProductCustomerColumn
 */
class ProductCustomerColumnRepositoryEloquent extends BaseRepository implements ProductCustomerColumnRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return ProductCustomerColumn::class;
    }
}
