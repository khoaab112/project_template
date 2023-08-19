<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as BaseRepositoryPrettus;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Events\RepositoryEntityCreated;
use Prettus\Repository\Events\RepositoryEntityCreating;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;
use Prettus\Validator\Contracts\ValidatorInterface;

/**
 * Class BaseRepository.
 *
 * @package namespace App\Repositories\BaseRepository;
 */
abstract class BaseRepository extends BaseRepositoryPrettus implements CacheableInterface
{
    use CacheableRepository;

    protected $cacheModel = null;

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function cacheModel()
    {
        $this->cacheModel = $this->model;
        $this->makeModel();
    }

    public function restoreCacheModel()
    {
        if (!empty($this->cacheModel)) {
            $this->model = $this->cacheModel;
        }
        $this->cacheModel = null;
    }

    /**
     * Save a new entity in repository
     *
     * @throws ValidatorException
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        if (!is_null($this->validator)) {
            // we should pass data that has been casts by the model
            // to make sure data type are same because validator may need to use
            // this data to compare with data that fetch from database.
            if ($this->versionCompare($this->app->version(), "5.2.*", ">")) {
                $attributes = $this->model->newInstance()
                    ->forceFill($attributes)
                    ->makeVisible($this->model->getHidden())
                    ->toArray();
            } else {
                $model = $this->model->newInstance()->forceFill($attributes);
                $model->makeVisible($this->model->getHidden());
                $attributes = $model->toArray();
            }

            $this->validator->with($attributes)->passesOrFail(ValidatorInterface::RULE_CREATE);
        }

        event(new RepositoryEntityCreating($this, $attributes));

        $model = $this->model->newInstance()->fill($attributes);
        $model->save();
        $this->resetModel();

        event(new RepositoryEntityCreated($this, $model));

        return $this->parserResult($model);
    }

    public function firstWhere(array $where)
    {
        $this->applyCriteria();
        $this->applyScope();

        $this->applyConditions($where);

        $model = $this->model->firstOrFail();
        $this->resetModel();

        return $this->parserResult($model);
    }

    public function whereNotNull($field, $limit = null, $columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();
        $model = $this->model->whereNotNull($field)->select($columns);
        if (!empty($limit)) {
            $model = $model->paginate($limit);
        } else {
            $model = $model->get();
        }

        $this->resetModel();

        return $this->parserResult($model);
    }

    public function whereNull($field, $limit = null, $columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();
        $model = $this->model->whereNull($field)->select($columns);
        if (!empty($limit)) {
            $model = $model->paginate($limit);
        } else {
            $model = $model->get();
        }

        $this->resetModel();

        return $this->parserResult($model);
    }

    public function findWhereWithTrash(array $where, $columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();

        $this->applyConditions($where);

        $model = $this->model
            ->withTrashed()
            ->get($columns);
        $this->resetModel();

        return $this->parserResult($model);
    }
}
