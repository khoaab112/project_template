<?php

namespace App\Services;

use App\Repositories\Brand\BrandRepository;
use Illuminate\Support\Facades\Storage;
use Flash;

class BrandService
{
    protected $brandRepo;
    public function __construct(BrandRepository $brandRepo)
    {
        $this->brandRepo = $brandRepo;
    }

    public function getAll(array $payloads)
    {
        $brands = $this->brandRepo->paginate(20);

        if (isset($payloads['search'])) {
            $brands = $this->brandRepo->where("name", "like", '%' . $payloads["search"] . '%')->paginate(10);

        }

        return $brands;
    }

    public function store($request)
    {
        if ($request->hasFile('brand_img')) {
            $image = $request->file('brand_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/brands'), $filename);
        }
       $params = $request->validated();
        $params['image'] = $filename;

        $brand = $this->brandRepo->create($params);
        return $brand;
    }

    public function getBrand(int $id)
    {
        return $this->brandRepo->find($id);
    }

    public function update(array $params, int $id)
    {
        $brands = $this->brandRepo->find($id);
        $brands->update($params);
        return $brands;
    }

    public function destroy(int $id)
    {
        $brands = $this->brandRepo->find($id);
        if (empty($brands)) {
            Flash::error('Không tìm thấy thương hiệu');

            return;
        }

        $brands->delete($id);
        return null;
    }
}
