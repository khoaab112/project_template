<?php

namespace App\Repositories\OrderVoucher;

use App\Repositories\BaseRepository;
use App\Models\OrderVoucher;

/**
 * Class OrderVoucherRepository
 * @package App\Repositories\OrderVoucher
 */
class OrderVoucherRepositoryEloquent extends BaseRepository implements OrderVoucherRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return OrderVoucher::class;
    }
}
