<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductVariant\ProductVariantStoreRequest;
use App\Repositories\Attribute\AttributeRepository;
use App\Repositories\AttributeValue\AttributeValueRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\ProductManual\ProductManualRepository;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    protected $productVariantRepo, $attributeRepo, $productRepo, $attributeValueRepo;
    public function __construct(
        ProductManualRepository $productVariantRepo,
        AttributeRepository $attributeRepo,
        ProductRepository $productRepo,
        AttributeValueRepository $attributeValueRepo
    )
    {
        $this->productVariantRepo = $productVariantRepo;
        $this->attributeRepo = $attributeRepo;
        $this->productRepo = $productRepo;
        $this->attributeValueRepo = $attributeValueRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $this->productVariantRepo->query();
        $params = $request->all();

        if (isset($params['id'])) {
            $query = $query->where('id', $params['id']);
        }

        if (isset($params['product_id'])) {
            $query = $query->where('product_id', $params['product_id']);
        }

        if (isset($params['sku'])) {
            $query = $query->where('sku', $params['sku']);
        }

        $productVariants = $query->paginate(15);

        return view('admin.product_variants.index')
            ->with('productVariants', $productVariants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!isset($request->product_id)) {
            return redirect(route('products.index'));
        }

        $attributes = $this->attributeRepo->all();
        $product = $this->productRepo->with(['productAttributeValue' => function($query) {
            $query->where('product_variant_id', '>', 0);

        }, 'productAttributeValue.attributeValue'])
            ->where('id', $request->product_id)
            ->first();
        $variantAttribute = $attributeValue = [];

        if ($product->productAttributeValue->count()) {
            foreach ($product->productAttributeValue as $value) {
                $variantAttribute[] = $value->attributeValue->attribute_id;
            }
        }


        if (!empty($variantAttribute))
            $attributeValue = $this->attributeValueRepo->whereIn("attribute_id", $variantAttribute)->get();

        return view('admin.product_variants.create')
            ->with("variantAttribute", $variantAttribute)
            ->with("variantAttributeValue", $attributeValue)
            ->with("attributes", $attributes)
            ->with("product", $product);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductVariantStoreRequest $request)
    {
        $params = $request->validated();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
