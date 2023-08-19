<?php

namespace App\Services;

use App\Repositories\Attribute\AttributeRepository;
use Flash;
class AttributeService
{
    protected $attributeRepo;
    public function __construct(AttributeRepository $attributeRepository)
    {
        $this->attributeRepo = $attributeRepository;
    }

    public function getAll(array $payload)
    {
        dd($this->attributeRepo->all());
        return $this->attributeRepo->all();
    }

    public function store(array $params)
    {
        return $this->attributeRepo->create($params);
    }

    public function getData(int $id)
    {
        $attr = $this->attributeRepo->find($id);

        if (empty($attr)) {
            Flash::error('Attribute not found');

            return redirect(route('attributes.index'));
        }

        return $attr;
    }

    public function update(array $params, int $id)
    {
        $attr = $this->attributeRepo->find($id);
        if (empty($attr)) {
            Flash::error('Attribute not found');

            return redirect(route('attributes.index'));
        }
        return $attr->update($params);

    }

    public function destroy(int $id)
    {
        $attr = $this->attributeRepo->find($id);

        if (empty($attr)) {
            Flash::error('Attribute not found');

            return redirect(route('attributes.index'));
        }
        $attr->delete($id);
        return null;
    }
}
