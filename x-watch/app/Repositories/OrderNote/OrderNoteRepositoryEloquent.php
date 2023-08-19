<?php

namespace App\Repositories\OrderNote;

use App\Repositories\BaseRepository;
use App\Models\OrderNote;

/**
 * Class OrderNoteRepository
 * @package App\Repositories\OrderNote
 */
class OrderNoteRepositoryEloquent extends BaseRepository implements OrderNoteRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return OrderNote::class;
    }
}
