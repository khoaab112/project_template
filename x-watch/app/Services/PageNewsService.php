<?php

namespace App\Services;

use App\Repositories\PageNews\PageNewsRepository;

class PageNewsService
{
    protected $pageNewRepo;
    public function __construct(PageNewsRepository $pageNewRepo)
    {
        $this->pageNewRepo = $pageNewRepo;
    }

    public function getAll(array $payload)
    {
        return $this->pageNewRepo->paginate(20);
    }
}
