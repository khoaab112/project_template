<?php

namespace App\Services;

use App\Helper\FuncLib;
use App\Repositories\Brand\BrandRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\CategoryBrand\CategoryBrandRepository;

class CategoryBrandService
{
    protected $brandRepo;
    protected $catRepo;
    protected $catBrandRepo;
    public function __construct(
        BrandRepository $brandRepo,
        CategoryRepository $catRepo,
        CategoryBrandRepository $catBrandRepo
    )
    {
        $this->brandRepo = $brandRepo;
        $this->catRepo = $catRepo;
        $this->catBrandRepo = $catBrandRepo;
    }

    public function getAll(array $payloads)
    {
        $brands = $this->brandRepo->all();
        $cate = $this->catRepo->where('parent_id', 0)->get();
        $cate = FuncLib::data_tree($cate->toArray());
        $query = $this->catBrandRepo->with(['category', 'brand']);

        if (isset($payloads['category_id']) && $payloads['category_id'] > 0) {
            $category = $this->catRepo->find($payloads["category_id"]);
            $categoryBrand = $this->catBrandRepo->where("category_id", $payloads["category_id"])
                ->get(["brand_id"])
                ->toArray();
            $brands = $this->brandRepo->whereIn('id', $categoryBrand)->get();
            if (empty($category->children_path)) {
                $query = $query->where("category_id", $payloads["category_id"]);
            } else {
                $aryId = explode("/", $category->children_path);
                $query = $query->whereIn("category_id", $aryId);
            }
        }

        if (isset($payloads["brand_id"]) && $payloads["brand_id"] > 0) {
            $query = $query->where("brand_id", $payloads["brand_id"]);
        }

        $categoryBrands = $query->paginate(30);
        return [
            $brands,
            $cate,
            $categoryBrands
        ];
    }

    public function getCreate()
    {
        $categories = FuncLib::data_tree($this->catRepo->where("parent_id", 0)->get()->toArray());
        $brand = $this->brandRepo->all();
        return [$categories, $brand];
    }

    public function store(array $params)
    {
        return $this->catBrandRepo->create($params);
    }

    public function destroy(int $id)
    {
        if (empty($id)) {
            return FuncLib::success(404);
        }

        $catbrand = $this->catBrandRepo->find($id);
        $catbrand->delete($id);
        return null;
    }

    public function getEdit(int $id)
    {
        return $this->catBrandRepo->find($id);
    }
}
