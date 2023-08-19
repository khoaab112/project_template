<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tags\TagRequest;
use App\Services\TagService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Flash;

class TagController extends Controller
{
    protected $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $payload = $request->all();
        $data = $this->tagService->getAll($payload);

        return view('admin.tags.index')->with('tagGroups', $data[1])->with('tags', $data[0]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->tagService->viewCreate();
        return view('admin.tags.create')->with('tagIdGroup', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $params = $request->validated();

        try {
            $tags = $this->tagService->store($params);
            Flash::success('Tags saved successfully.');

            return redirect(route('tags.index'));

        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->tagService->getEdit($id);

        if (empty($data)) {
            Flash::error('Tag not found');

            return redirect(route('tags.index'));
        }

        return view('admin.tags.edit')->with('tag', $data[0])->with('tagIdGroup', $data[1]);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        $request = $request->validated();
        try {
            $tag = $this->tagService->update($request, $id);
            Flash::success('Tags saved successfully.');

            return redirect(route('tags.index'));
        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->tagService->destroy($id);
            Flash::success('Tags delete successfully.');
            return redirect(route('tags.index'));

        } catch (\Exception $e) {
            Log::error($e);
        }
    }
}
