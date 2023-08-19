<?php

namespace App\Http\Controllers\Admin;

use App\Helper\FuncLib;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryBrand\CategoryBrandRequest;
use App\Services\CategoryBrandService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Flash;

class CategoryBrandController extends Controller
{
    protected $cateBrand;
    public function __construct(CategoryBrandService $brandService)
    {
        $this->cateBrand = $brandService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $payloads = $request->all();
        $data = $this->cateBrand->getAll($payloads);

        return view('admin.category_brands.index')
            ->with('categoryBrands', $data[2])
            ->with('brands', $data[0])
            ->with('categories', $data[1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->cateBrand->getCreate();

        return view('admin.category_brands.create')
            ->with("categories", $data[0])
            ->with("brands", $data[1]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryBrandRequest $request)
    {
        $params = $request->validated();
        try {
            $catbrand = $this->cateBrand->store($params);
            Flash::success('Brands saved successfully.');

            return redirect(route('categoryBrands.index'));

        } catch (\Exception $e) {
            Log::error($e);
        }
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
        $categoryBrand = $this->cateBrand->getEdit($id);
        if (empty($categoryBrand)) {
            Flash::error('Category Brand not found');

            return redirect(route('categoryBrands.index'));
        }

        return view('admin.category_brands.edit')->with('categoryBrand', $categoryBrand);

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
        try {
            $brands = $this->cateBrand->destroy($id);

            return FuncLib::success(200, 'Brand', 'categoryBrands');

        } catch (\Exception $e) {
            Log::error($e);
        }
    }
}
