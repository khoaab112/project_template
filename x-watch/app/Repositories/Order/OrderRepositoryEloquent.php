<?php

namespace App\Repositories\Order;

use App\Repositories\BaseRepository;
use App\Models\Order;

/**
 * Class OrderRepository
 * @package App\Repositories\Order
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Order::class;
    }
}
