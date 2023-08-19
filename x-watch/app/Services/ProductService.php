<?php

namespace App\Services;

use App\Helper\FuncLib;
use App\Repositories\Brand\BrandRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\CategoryBrand\CategoryBrandRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\ProductVariant\ProductVariantRepository;

class ProductService
{
    private $productRepository;
    private $productVariantRepository;
    private $brandRepo, $categoryRepo, $categoryBrandRepo;
    public function __construct(
        ProductRepository $productRepository,
        ProductVariantRepository $productVariantRepository,
        BrandRepository $brandRepo,
        CategoryRepository $categoryRepo,
        CategoryBrandRepository $categoryBrandRepo
    )
    {
        $this->productRepository = $productRepository;
        $this->productVariantRepository = $productVariantRepository;
        $this->brandRepo = $brandRepo;
        $this->categoryRepo = $categoryRepo;
        $this->categoryBrandRepo = $categoryBrandRepo;
    }

    public function getData(array $request)
    {
        $brands = $this->brandRepo->all();
        $category = $this->categoryRepo->all();
        $categories = FuncLib::data_tree($category->toArray());

        $query = $this->productRepository->with(['brand', 'variants', 'images']);


        if (isset($request["status"]) && $request["status"] > 0)
            $query = $query->where("status", $request["status"]);

        if (isset($request['category_id'])  && $request['category_id'] >= 0) {
            $category = $this->categoryRepo->find($request['category_id']);

            $categoryBrand = $this->categoryBrandRepo->where('category_id', $request['category_id'])
                ->get('brand_id')->toArray();

            $brands = $this->brandRepo->whereIn('id', $categoryBrand)->get();
        }

        if (isset($request['brand_id']) && $request["brand_id"] > 0) {
            $query = $query->where('brand_id', $request['brand_id']);
        }

        if (isset($request['search'])) {
            $query = $query->where("name", "like", '%' . $request["search"] . '%');

        }

        if (isset($request["product_id"]))
            $query = $query->where("id", $request["product_id"]);

        if (isset($request["sync_seo"]) && $request["sync_seo"] != -1)
            $query = $query->where("sync_seo_content", $request["sync_seo"]);

        if (isset($request["sku"])) {
            $productVariant = $this->productVariantRepository->where("sku", $request["sku"])->first();
            if (!empty($productVariant))
                $query = $query->where("id", $productVariant->product_id);
        }

        $products = $query->paginate(15);

        return [$products, $categories, $brands];
    }

    public function getCreate()
    {
        $brands = $this->brandRepo->all();
        $categories = $this->categoryRepo->all();
        $categories = FuncLib::data_tree($categories->toArray());
        return ['brand' => $brands, 'categories' => $categories];
    }


    public function getEdit()
    {
    }

    public function store(array $params)
    {
        if (!empty($params["video_url"])){
            $video_url= $params["video_url"];
            $video_url=str_replace('shorts/','watch?v=',$video_url);
            $params["video_url"] = $video_url;
        }

        if (isset($params['price'])) {
            $params['price'] = str_replace('.', '', $params['price']);
        }
        $product = $this->productRepository->create($params);

        if (isset($params["default_img"]) && !empty($params["default_img"])) {

            foreach ($params["default_img"] as $image) {
                $this->createProductImage($product->id, $image);
            }
        }

        return $product;
    }

    private function createProductImage($id, $image)
    {
        dd($image);
    }
}
