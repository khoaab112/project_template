<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductAttributeValue\ProductAttributeValueStoreRequest;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Repositories\Attribute\AttributeRepository;
use App\Repositories\ProductAttributeValue\ProductAttributeValueRepository;
use App\Repositories\ProductImage\ProductImageRepository;
use App\Repositories\ProductVariant\ProductVariantRepository;
use Illuminate\Http\Request;

class ProductAttributeValueController extends Controller
{
    protected $productAttributeValueRepository, $productImageRepo, $productVariantRepo, $attributeRepo;

    public function __construct(
        ProductAttributeValueRepository $productAttributeRepo,
        ProductImageRepository $productImageRepository,
        ProductVariantRepository $productVariantRepository,
        AttributeRepository $attributeRepository
    )
    {
        $this->productAttributeValueRepository = $productAttributeRepo;
        $this->productImageRepo = $productImageRepository;
        $this->productVariantRepo = $productVariantRepository;
        $this->attributeRepo = $attributeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request = $request->all();

        $query = $this->productAttributeValueRepository->with([
            'variant',
            'attributeValue',
            "attributeValue.attribute",
            "productImage"
        ]);

        if (isset($request["product_id"])) {
            $query = $query->where("product_id", $request["product_id"]);
            $productImages = $this->productImageRepo->where("product_id", $request["product_id"])->get();
        }

        if (isset($request["sku"])) {
            $variant = $this->productVariantRepo->where("sku", $request["sku"])->first();

            if (!empty($variant))
                $query = $query->where("product_variant_id", $variant->id);
        }

        $productAttributeValues = $query->paginate(15);

        return view('admin.product_attribute_values.index')
            ->with('productImages', $productImages ?? [])
            ->with('productAttributeValues', $productAttributeValues);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributes = $this->attributeRepo->all();
        return view('admin.product_attribute_values.create')->with("attributes", $attributes);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductAttributeValueStoreRequest $request)
    {
        $input = $request->validated();

        $productAttributeValue = $this->productAttributeValueRepository->create($input);

        \Flash::success('Product Attribute Value saved successfully.');

        return redirect(route('productAttributeValues.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productAttributeValue = $this->productAttributeValueRepository->find($id);

        if (empty($productAttributeValue)) {
            \Flash::error('Product Attribute Value not found');

            return redirect(route('productAttributeValues.index'));
        }

        return view('admin.product_attribute_values.show')->with('productAttributeValue', $productAttributeValue);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productAttributeValue = $this->productAttributeValueRepository->with([
            'attributeValue', 'attributeValue.attribute'
        ]);
        if (empty($productAttributeValue)) {
            \Flash::error('Product Attribute Value not found');

            return redirect(route('productAttributeValues.index'));
        }

        $attributes = $this->attributeRepo->all();

        return view('admin.product_attribute_values.edit')
            ->with("attributes", $attributes)
            ->with('productAttributeValue', $productAttributeValue);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductAttributeValueStoreRequest $request, $id)
    {
        $request = $request->validated();

        $productAttributeValue = $this->productAttributeValueRepository->find($id);

        if (empty($productAttributeValue)) {
            \Flash::error('Product Attribute Value not found');
            return redirect(route('productAttributeValues.index'));
        }

        $this->productAttributeValueRepository->where('product_id', $productAttributeValue->product_id)
            ->where('attribute_value_id', $productAttributeValue->attribute_value_id)
            ->update(['product_image_id' => $request['product_image_id']]);

        \Flash::success('Product Attribute Value updated successfully.');

        return redirect(route('productAttributeValues.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productAttributeValue = $this->productAttributeValueRepository->find($id);

        if (empty($productAttributeValue)) {
            \Flash::error('Product Attribute Value not found');

            return redirect(route('productAttributeValues.index'));

        }

        $this->productAttributeValueRepository->delete($id);

        \Flash::success('Product Attribute Value deleted successfully.');

        return redirect(route('productAttributeValues.index'));
    }
}
