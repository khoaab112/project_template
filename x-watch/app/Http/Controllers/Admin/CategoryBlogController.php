<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategory\BlogCategoryRequest;
use App\Http\Requests\BlogCategory\BlogCategoryStoreRequest;
use App\Services\CategoryBlogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Flash;
class CategoryBlogController extends Controller
{
    private $service;

    public function __construct(CategoryBlogService $service)
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
        //
        $data = $this->service->getAllData($request->all());
        return view('admin.category_blog.index')
            ->with('categories', $data[0])
            ->with('cat_tree', $data[1])
            ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->service->getCreate();
        return view('admin.category_blog.create', ['categoryBlogData' => $categories ?? []]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryStoreRequest $request)
    {
        $params = $request->validated();

        try {
            $cate = $this->service->store($params);
            Flash::success('Tạo danh mục thành công');

            return redirect(route('categoryBlog.index'));


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
        $categoryBlog = $this->service->edit($id);
        return view('admin.category_blog.edit')
            ->with('categoryBlog', $categoryBlog[0])
            ->with('categoryBlogData', $categoryBlog[1]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryStoreRequest $request, $id)
    {
        $params = $request->validated();

        try {
            $cateBlog = $this->service->update($params, $id);

            \Flash::success('Category Blog saved successfully.');

            return redirect(route('categoryBlog.index'));

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
        $blogCate = $this->service->destroy($id);

        Flash::success('Category Blog destroy successfully.');

        return redirect(route('categoryBlog.index'));
    }
}
