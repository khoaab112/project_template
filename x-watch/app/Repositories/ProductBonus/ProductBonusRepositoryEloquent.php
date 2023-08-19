<?php

namespace App\Repositories\ProductBonus;

use App\Repositories\BaseRepository;
use App\Models\ProductBonus;

/**
 * Class ProductBonusRepository
 * @package App\Repositories\ProductBonus
 */
class ProductBonusRepositoryEloquent extends BaseRepository implements ProductBonusRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return ProductBonus::class;
    }
}
