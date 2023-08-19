<?php

namespace App\Services;

use App\Helper\FuncLib;
use App\Repositories\Blog\BlogRepository;
use App\Repositories\BlogCategory\BlogCategoryRepository;

class BlogService
{
    private $blogRepo, $categoryRepo;

    public function __construct(BlogRepository $blogRepo, BlogCategoryRepository $categoryRepository)
    {
        $this->blogRepo = $blogRepo;
        $this->categoryRepo = $categoryRepository;
    }

    public function getAllData(array $payload)
    {
        $data = $this->blogRepo->all();
        $categoryBlog = $this->categoryRepo->all();
        $categories = FuncLib::data_tree($categoryBlog->toArray());
        return [$data, $categories];
    }

    public function getCreate()
    {
        $categories = $this->categoryRepo->all();
        $categories = FuncLib::data_tree($categories->toArray());
        return $categories;
    }

    public function store(array $params)
    {
        return $this->blogRepo->create($params);
    }

    public function getEdit(int $id)
    {
        $blog = $this->blogRepo->find($id);
        $categories = $this->categoryRepo->all();
        $categories = FuncLib::data_tree($categories->toArray());

        return [$categories, $blog];
    }

    public function update(array $params, int $id)
    {
        $blog = $this->blogRepo->find($id);

        $blog->update($params);
        return $blog;
    }
}
