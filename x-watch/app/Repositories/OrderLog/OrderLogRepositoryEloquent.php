<?php

namespace App\Repositories\OrderLog;

use App\Repositories\BaseRepository;
use App\Models\OrderLog;

/**
 * Class OrderLogRepository
 * @package App\Repositories\OrderLog
 */
class OrderLogRepositoryEloquent extends BaseRepository implements OrderLogRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return OrderLog::class;
    }
}
