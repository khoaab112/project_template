<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Attribute\AttributeRequest;
use App\Services\AttributeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Flash;

class AttributeController extends Controller
{
    protected $attributeService;

    public function __construct(AttributeService $attributeService)
    {
        $this->attributeService = $attributeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $payload = $request->all();
        return view('admin.attributes.index')->with('attributes', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeRequest $request)
    {
        $params = $request->validated();

        try {
            $attr = $this->attributeService->store($params);
            Flash::success('Attribute saved successfully.');

            return redirect(route('attributes.index'));

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
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $attribute = $this->attributeService->getData($id);
        return view('admin.attributes.show')->with('attribute', $attribute);
    }

    /**
     * @param AttributeRequest $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function update(AttributeRequest $request, $id)
    {
        $params = $request->validated();
        try {
            $attr = $this->attributeService->update($params, $id);

            Flash::success('Brands saved successfully.');

            return redirect(route('attributes.index'));
        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->attributeService->destroy($id);

        Flash::success('Brands destroy successfully.');

        return redirect(route('attributes.index'));
    }
}
