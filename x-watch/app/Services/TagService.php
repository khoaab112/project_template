<?php

namespace App\Services;

use App\Repositories\TagGroup\TagGroupRepository;
use App\Repositories\Tags\TagsRepository;
use Flash;

class TagService
{
    protected $tagRepo, $tagGroupRepo;

    public function __construct(TagsRepository $tagRepo, TagGroupRepository $tagGroupRepo)
    {
        $this->tagRepo = $tagRepo;
        $this->tagGroupRepo = $tagGroupRepo;
    }

    public function store(array $params)
    {
        $tag = $this->tagRepo->create($params);
        return $tag;
    }

    public function getAll(array $payload)
    {
        $tagGroup = $this->tagGroupRepo->all();
        $query = $this->tagRepo->with('tagGroup');
        if (isset($payload['tag_group_id'])) {
            $query = $query->where('tag_group_id', $payload['tag_group_id']);
        }

        $tag = $query->paginate(20);
        return [$tag, $tagGroup];
    }

    public function viewCreate()
    {
        return $this->tagGroupRepo->all();
    }

    public function getEdit(int $id)
    {
        $tagIdGroup = $this->tagGroupRepo->all();
        $tag = $this->tagRepo->find($id);
        return [$tag, $tagIdGroup];
    }

    public function update(array $request, int $id)
    {
        $tag = $this->tagRepo->find($id);
        $tag->update($request);
        return $tag;
    }

    public function destroy(int $id)
    {
        if (empty($id)) {
            Flash::error('Không tìm thấy bản ghi');
            return;
        }

        $tag = $this->tagRepo->find($id);
        $tag->delete($id);
        return null;
    }
}
