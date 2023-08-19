<?php

namespace App\Services;

use App\Models\Attribute;
use App\Repositories\Attribute\AttributeRepository;
use App\Repositories\AttributeValue\AttributeValueRepository;
use Flash;

class AttributeValueService
{
    protected $attrRepo;
    protected $attrValueRepo;

    public function __construct(AttributeRepository $attrRepo, AttributeValueRepository $attrValueRepo)
    {
        $this->attrRepo = $attrRepo;
        $this->attrValueRepo = $attrValueRepo;
    }

    public function getAll(array $payload)
    {
        $query = $this->attrValueRepo->with('attribute');
        if (isset($payload['attribute_name'])) {
            $attribute = $this->attrRepo->where("name", $payload["attribute_name"])->first();
            if ($attribute)
                $query = $query->where("attribute_id", $attribute->id);
        }

        return $query->orderBy('code', 'ASC')->paginate(15);
    }

    public function getCreate()
    {
        return $this->attrRepo->all();
    }

    public function store(array $params)
    {
        return $this->attrValueRepo->create($params);
    }

    public function getEdit(int $id)
    {
        $attribute = $this->attrRepo->all();
        $attributeVal = $this->attrValueRepo->find($id);

        return [$attribute, $attributeVal];
    }

    public function update(array $params, int $id)
    {
        $attrVal = $this->attrValueRepo->find($id);
        $attrVal->update($params);

    }

    public function destroy(int $id)
    {
        $data = $this->attrValueRepo->find($id);
        if (empty($data)) {
            Flash::error('Attribute Value not found');

            return redirect(route('attributeValues.index'));
        }

        $data->delete($id);
        return null;
    }
}
