<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\Brand\BrandRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $productRepo, $brandsRepo,$category;
    public function __construct(BrandRepository $brandsRepo, ProductRepository $productRepo,CategoryRepository $category)
    {
        $this->productRepo = $productRepo;
        $this->brandsRepo = $brandsRepo;
        $this->category = $category;

    }

    public function index()
    {
    
        return view('web.home')->with('category', $this->category->all()->toArray());
    
    }

    public function brands()
    {
        $listBrands = $this->brandsRepo->all();
        $listAlphabet = range('a', 'z');
        return view('web.brands', ['listAlphabet' => $listAlphabet, 'listBrands' => $listBrands]);
    }

    public function getBrands(Request $request)
    {

    }
}
