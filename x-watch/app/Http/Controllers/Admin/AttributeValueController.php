<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeValue\CreateAttributeValueRequest;
use App\Services\AttributeValueService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Flash;

class AttributeValueController extends Controller
{
    protected $attrValue;

    public function __construct(AttributeValueService $attrValue)
    {
        $this->attrValue = $attrValue;
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
        $data = $this->attrValue->getAll($payload);

        return view('admin.attribute_values.index')
            ->with('attributeValues', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attr = $this->attrValue->getCreate();

        return view('admin.attribute_values.create', ["attributes" => $attr]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAttributeValueRequest $request)
    {
        $params = $request->validated();

        try {
            $attrVal = $this->attrValue->store($params);
            Flash::success('Attribute saved successfully.');

            return redirect(route('attributeValues.index'));
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
        $data = $this->attrValue->getEdit($id);
        return view('admin.attribute_values.edit')
            ->with('attributes', $data[0])
            ->with('attributeValue', $data[1]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateAttributeValueRequest $request, $id)
    {
       $params = $request->validated();

        try {
            $this->attrValue->update($params, $id);

            Flash::success('Attribute Value updated successfully.');

            return redirect(route('attributeValues.index'));
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
        $attr = $this->attrValue->destroy($id);
        Flash::success('Attribute Value deleted successfully.');

        return redirect(route('attributeValues.index'));
    }
}
