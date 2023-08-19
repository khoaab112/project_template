<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $payload = $request->all();
        $data = $this->service->getData($payload);


        return view('admin.products.index')
            ->with('products', $data[0])
            ->with("categories", $data[1])
            ->with('brands', $data[2]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data = $this->service->getCreate();
        return view('admin.products.create')
            ->with("categories", $data['categories'])
            ->with('brands', $data['brand']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(ProductStoreRequest $request)
    {
        $params = $request->validated();

        try {

            DB::beginTransaction();
            $product = $this->service->store($params);
            DB::commit();

            \Flash::error('Thêm sản phẩm thất bại');
            return redirect(route('products.index'));
        } catch (\Exception $e) {

            Log::error($e);
            DB::rollBack();
            \Flash::error('Tạo sản phẩm thất bại');
            return redirect(route('products.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
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
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
