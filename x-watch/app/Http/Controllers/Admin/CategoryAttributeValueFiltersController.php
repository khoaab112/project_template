<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryAttribute\CreateCategoryAttributeValueFiltersRequest;
use App\Repositories\CategoryAttributeValueFilters\CategoryAttributeValueFiltersRepository;
use App\Services\CategoryAttributeValueFilterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryAttributeValueFiltersController extends Controller
{
    protected $service, $repository;
    public function __construct(
        CategoryAttributeValueFilterService $service,
        CategoryAttributeValueFiltersRepository $repo)
    {
        $this->service = $service;
        $this->repository = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->repository->all();
        return view('admin.category_attribute_value_filters.index')
            ->with('categoryAttributeValueFilters', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $params = $request->all();
        $data = $this->service->create($params);
        return view('admin.category_attribute_value_filters.create')
            ->with("categoryAttribute", $data[0])
            ->with("attributeVales", $data[1]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryAttributeValueFiltersRequest $request)
    {
        $params = $request->validated();
        try {

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
