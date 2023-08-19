<?php

namespace App\Services;

use App\Helper\FuncLib;
use App\Models\Category;
use App\Models\CategoryAttributeFilter;
use App\Repositories\Attribute\AttributeRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\CategoryAttributeFilter\CategoryAttributeFilterRepository;
use App\Repositories\CategoryBrand\CategoryBrandRepository;
use App\Repositories\CategoryFilterPrice\CategoryFilterPriceRepository;
use App\Repositories\CategoryTag\CategoryTagRepository;
use App\Repositories\Tags\TagsRepository;

class CategoryAttributeFilterService
{
    protected $cateAttrRepo, $cateRepo, $categoryPriceFilter, $categoryBrandRepo, $tagRepo, $categoryTagRepo, $attrRepo;
    public function __construct(
        CategoryAttributeFilterRepository $repository,
        CategoryRepository $cateRepo,
        CategoryFilterPriceRepository $categoryPriceFilter,
        CategoryBrandRepository $categoryBrandRepo,
        TagsRepository $tagRepo,
        CategoryTagRepository $categoryTagRepo,
        AttributeRepository $attrRepo
    )
    {
        $this->cateAttrRepo = $repository;
        $this->cateRepo = $cateRepo;
        $this->categoryPriceFilter = $categoryPriceFilter;
        $this->categoryBrandRepo = $categoryBrandRepo;
        $this->tagRepo = $tagRepo;
        $this->categoryTagRepo = $categoryTagRepo;
        $this->attrRepo = $attrRepo;
    }

    public function getAllData(array $payload)
    {
        $data = $this->cateRepo->where('parent_id', 0)
            ->where('status', Category::CATEGORY_STATUS_IS_ACTIVE)
            ->get()->toArray();
        $categories = FuncLib::data_tree($data);

        if (isset($payload['category_id'])) {
            $categoryAttributeFilters = $this->cateAttrRepo
                ->with([
                'categoryAttributeValues',
                'categoryAttributeValues.attributeValue',
                'attribute'
            ])
                ->where('status', CategoryAttributeFilter::CATEGORY_IS_ACTIVE)
                ->where('category_id', $payload['category_id'])
                ->get();

            $categoryAttributePriceFilters = $this->categoryPriceFilter->where('category_id', $payload['category_id'])->get();

            $categoryAttributeBranchFilters = $this->categoryBrandRepo->with(['brand'])
                ->where('category_id', $payload['category_id'])->get();

            $tags = $this->tagRepo->with(['tagGroup'])->get();
            $tagGroup = [];

            foreach ($tags as $tag) {
                $tagGroup[$tag->tagGroup->code]["name"] = $tag->tagGroup->name;
                $tagGroup[$tag->tagGroup->code]["id"] = $tag->tagGroup->id;
                $tagGroup[$tag->tagGroup->code]["tags"][] = $tag;
            }

            $categoryTagAvailable = $this->categoryTagRepo
                ->where("category_id", $payload["category_id"])
                ->get()
                ->keyBy("tag_id")
                ->toArray();
        }

        return [
           'categoryAttributeFilters' => $categoryAttributeFilters ?? [],
            'categoryAttributePriceFilters' => $categoryAttributePriceFilters ?? [],
            'categoryAttributeBranchFilters' => $categoryAttributeBranchFilters ?? [],
            'tagGroup' => $tagGroup ?? [],
            'categoryTagAvailable' => $categoryTagAvailable ?? [],
            'categories' => $categories ?? []
        ];
    }

    public function create()
    {
        $data = $this->cateRepo->where('parent_id', 0)
                                ->where('status', Category::CATEGORY_STATUS_IS_ACTIVE)
                                ->get()->toArray();
        $categories = FuncLib::data_tree($data);
        $att = $this->attrRepo->all();
        return ['attributes' => $att, 'categories' => $categories];
    }

    public function store(array $params)
    {
        return $this->cateAttrRepo->create($params);
    }

    public function getEdit(int $id)
    {
        $categories = FuncLib::data_tree($this->cateRepo->all()->toArray());
        $attr = $this->attrRepo->all();

        $categoriesFilter = $this->cateAttrRepo->find($id);

        return [
            'categoryAttributeFilter' => $categoriesFilter,
            'categories' => $categories,
            'attr' => $attr
        ];
    }
}
