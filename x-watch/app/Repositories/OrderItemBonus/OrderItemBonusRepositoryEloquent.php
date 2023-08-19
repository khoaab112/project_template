<?php

namespace App\Repositories\OrderItemBonus;

use App\Repositories\BaseRepository;
use App\Models\OrderItemBonus;

/**
 * Class OrderItemBonusRepository
 * @package App\Repositories\OrderItemBonus
 */
class OrderItemBonusRepositoryEloquent extends BaseRepository implements OrderItemBonusRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return OrderItemBonus::class;
    }
}
