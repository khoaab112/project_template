<?php

namespace App\Repositories\TagGroup;

use App\Repositories\BaseRepository;
use App\Models\TagGroup;

/**
 * Class TagGroupRepository
 * @package App\Repositories\TagGroup
 */
class TagGroupRepositoryEloquent extends BaseRepository implements TagGroupRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return TagGroup::class;
    }
}
