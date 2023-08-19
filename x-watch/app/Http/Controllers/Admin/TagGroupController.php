<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagGroup\TagGroupRequest;
use App\Services\TagGroupService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TagGroupController extends Controller
{
    protected $tagGroupService;

    public function __construct(TagGroupService $tagGroupService)
    {
        $this->tagGroupService = $tagGroupService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $payload = $request->all();
        $data = $this->tagGroupService->getAll($payload);
        return view('admin.tag_groups.index')->with('tagGroups', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag_groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagGroupRequest $request)
    {
        $request = $request->validated();
        try {
            $tagGroup = $this->tagGroupService->store($request);
            \Flash::success('Category saved successfully.');
            return redirect(route('tagGroups.index'));

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
        $tagGroup = $this->tagGroupService->getData($id);

        if (empty($tagGroup)) {
            Flash::error('Tag Group not found');

            return redirect(route('tagGroups.index'));
        }

        return view('admin.tag_groups.edit')->with('tagGroup', $tagGroup);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagGroupRequest $request, $id)
    {
        $params = $request->validated();

        try {
            $this->tagGroupService->update($id, $params);
            \Flash::success('Tag Group saved successfully.');

            return redirect(route('tagGroups.index'));
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
        try {
            if (!$id) {
                Flash::error('Tag Group Not found.');
                return;
            }
            $this->tagGroupService->destroy($id);

            return redirect(route('tagGroups.index'));

        } catch (\Exception $e) {
            Log::error($e);
        }
    }
}
