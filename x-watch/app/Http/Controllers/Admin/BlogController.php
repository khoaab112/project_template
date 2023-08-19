<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogStoreRequest;
use App\Services\BlogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    private $service;

    public function __construct(BlogService $service)
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
        $payloads = $request->all();
        $data = $this->service->getAllData($payloads);

        return view('admin.blogs.index')
            ->with('blogs', $data[0])
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
        $data = $this->service->getCreate();
        return view('admin.blogs.create')->with('categoryBlogData', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogStoreRequest $request)
    {
        if (($request->hasFile('default_img'))) {
            $file = $request->file('default_img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/blogs'), $filename);
        }
        $params = $request->validated();
        try {
            $blog = $this->service->store($params);

            \Flash::success('Tạo bài viết thành công');

            return redirect(route('blog.index'));

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
        $blog = $this->service->getEdit($id);
        return view('admin.blogs.edit', ['categoryBlogData' => $blog[0], 'blogData' => $blog[1]]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogStoreRequest $request, $id)
    {
        if (($request->hasFile('default_image'))) {
            $file = $request->file('default_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/blogs'), $filename);
        }
        $params = $request->validated();

        try {
            $blog = $this->service->update($params, $id);
            \Flash::success('Cập nhật bài viết thành công');

            return redirect(route('blog.index'));

        } catch (\Exception $e) {
            Log::error($e);
            \Flash::error('Cập nhật bài viết thất bại');
            return redirect(route('blog.index'));
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
        //
    }
}
