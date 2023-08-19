<?php

namespace App\Repositories\Banner;

use App\Repositories\BaseRepository;
use App\Models\Banner;

/**
 * Class BannerRepository
 * @package App\Repositories\Banner
 */
class BannerRepositoryEloquent extends BaseRepository implements BannerRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Banner::class;
    }
}
