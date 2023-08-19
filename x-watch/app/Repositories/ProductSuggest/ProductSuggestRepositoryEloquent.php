<?php

namespace App\Repositories\ProductSuggest;

use App\Repositories\BaseRepository;
use App\Models\ProductSuggest;

/**
 * Class ProductSuggestRepository
 * @package App\Repositories\ProductSuggest
 */
class ProductSuggestRepositoryEloquent extends BaseRepository implements ProductSuggestRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return ProductSuggest::class;
    }
}
