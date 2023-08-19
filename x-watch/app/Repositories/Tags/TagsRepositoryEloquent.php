<?php

namespace App\Repositories\Tags;

use App\Repositories\BaseRepository;
use App\Models\Tag;

/**
 * Class TagsRepository
 * @package App\Repositories\Tags
 */
class TagsRepositoryEloquent extends BaseRepository implements TagsRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Tag::class;
    }
}
