<?php

namespace App\Services;

use App\Repositories\Attribute\AttributeRepository;
use App\Repositories\AttributeValue\AttributeValueRepository;
use App\Repositories\CategoryAttributeFilter\CategoryAttributeFilterRepository;

class CategoryAttributeValueFilterService
{
    protected $cateAttrRepo, $attrRepo;
    public function __construct(CategoryAttributeFilterRepository $cateAttrRepo, AttributeValueRepository $attrRepo)
    {
        $this->cateAttrRepo = $cateAttrRepo;
        $this->attrRepo = $attrRepo;
    }

    public function create(array $params)
    {
        if (empty($params['category_attribute_id'])) {
            return redirect()->back();
        }

        $cateAttr = $this->cateAttrRepo->find($params['category_attribute_id']) ;
        $attrValue = $this->attrRepo->where('attribute_id', $cateAttr->attribute_id)->get();
        return [$cateAttr, $attrValue];
    }
}
