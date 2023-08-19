<?php

namespace App\Services;

use App\Repositories\TagGroup\TagGroupRepository;

class TagGroupService
{
    protected $tagGroupRepo;
    public function __construct(TagGroupRepository $tagGroupRepo)
    {
        $this->tagGroupRepo = $tagGroupRepo;
    }

    public function getAll(array $payload)
    {
        return $this->tagGroupRepo->all();
    }

    public function store(array $request)
    {
        return $this->tagGroupRepo->create($request);
    }

    public function getData(int $id)
    {
        return $this->tagGroupRepo->find($id);
    }

    public function update(int $id, array $params)
    {
        $tagGroup = $this->tagGroupRepo->find($id);
        $tagGroup->update($params);
    }

    public function destroy(int $id)
    {
        $tagGroup = $this->tagGroupRepo->find($id);
        $tagGroup->delete($id);
    }
}
