<?php

namespace App\Repositories\Menu;

use App\Repositories\BaseRepository;
use App\Models\Menu;

/**
 * Class MenuRepository
 * @package App\Repositories\Menu
 */
class MenuRepositoryEloquent extends BaseRepository implements MenuRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Menu::class;
    }
}
