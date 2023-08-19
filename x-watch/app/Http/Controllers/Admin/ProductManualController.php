<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductManual\ProductManualStoreRequest;
use App\Repositories\ProductManual\ProductManualRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductManualController extends Controller
{
    protected $productManualRepo;

    public function __construct(ProductManualRepository $productManualRepo)
    {
        $this->productManualRepo = $productManualRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->productManualRepo->paginate(15);
        return view('admin.product_manual.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_manual.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductManualStoreRequest $request)
    {
        $params = $request->validated();

        try {
            $productManual = $this->productManualRepo->create($params);

            \Flash::success('Category saved successfully.');

            return redirect(route('productManual.index'));

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
        $productManual = $this->productManualRepo->find($id);

        return view('admin.product_manual.edit', ['productManual' => $productManual]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductManualStoreRequest $request, $id)
    {
        $params = $request->validated();

        try {
            $productManual = $this->productManualRepo->find($id);

            $productManual->update($params);

            \Flash::success('Cập nhật thông tin thành công');

            return redirect(route('productManual.index'));

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
        $productManual = $this->productManualRepo->find($id);

        if (empty($productManual)) {
            \Flash::error('Không tìm thấy thông tin');
            return;
        }
        $productManual->delete($id);

        \Flash::success('Xóa dữ liệu thành công');

        return redirect(route('productManual.index'));
    }
}
