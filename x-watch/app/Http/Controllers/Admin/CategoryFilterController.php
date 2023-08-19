<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CategoryServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryFilterController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryServices $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function updateCategoryBrand(Request $request)
    {
        try {

            $this->categoryService->updateCategoryBrand($request->all());
            return redirect()->back();
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

}
