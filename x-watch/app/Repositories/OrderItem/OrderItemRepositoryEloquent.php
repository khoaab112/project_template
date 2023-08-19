<?php

namespace App\Repositories\OrderItem;

use App\Repositories\BaseRepository;
use App\Models\OrderItem;

/**
 * Class OrderItemRepository
 * @package App\Repositories\OrderItem
 */
class OrderItemRepositoryEloquent extends BaseRepository implements OrderItemRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return OrderItem::class;
    }
}
