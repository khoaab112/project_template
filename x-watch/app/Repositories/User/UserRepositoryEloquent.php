<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Models\User;

/**
 * Class UserRepository
 * @package App\Repositories\User
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return User::class;
    }
}
