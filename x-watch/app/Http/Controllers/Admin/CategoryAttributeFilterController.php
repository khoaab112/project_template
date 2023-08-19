<?php

namespace App\Http\Controllers\Admin;

use App\Helper\FuncLib;
use App\Http\Controllers\Controller;
use App\Services\CategoryAttributeFilterService;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Log;

class CategoryAttributeFilterController extends Controller
{
    protected $service;

    public function __construct(CategoryAttributeFilterService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $payload = $request->all();

        $data = $this->service->getAllData($payload);

        return view('admin.category_attribute_filters.index')
            ->with('categoryAttributeFilters', $data['categoryAttributeFilters'])
            ->with('categoryAttributePriceFilters', $data['categoryAttributePriceFilters'])
            ->with('categoryAttributeBranchFilters', $data['categoryAttributeBranchFilters'])
            ->with('tagGroup', $data['tagGroup'])
            ->with('categoryTagAvailable', $data['categoryTagAvailable'])
            ->with("categories", $data['categories']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->service->create();

        return view('admin.category_attribute_filters.create')
            ->with("attributes", $data['attributes'])
            ->with("categories", $data['categories']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        try {
            $cattAttr = $this->service->store($params);
            Flash::success('Category Attribute Filter saved successfully.');

            return redirect(route('categoryAttributeFilters.index'));

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
        $data = $this->service->getEdit($id);

        return view('admin.category_attribute_filters.edit')
            ->with('categoryAttributeFilter', $data['categoryAttributeFilter'])
            ->with("categories", $data['categories'])
            ->with("attributes", $data['attributes']);
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
