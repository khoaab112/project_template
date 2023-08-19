<?php

namespace App\Repositories\PageNews;

use App\Repositories\BaseRepository;
use App\Models\PageNews;

/**
 * Class PageNewsRepository
 * @package App\Repositories\PageNews
 */
class PageNewsRepositoryEloquent extends BaseRepository implements PageNewsRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return PageNews::class;
    }
}
