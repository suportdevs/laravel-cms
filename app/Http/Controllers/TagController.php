<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $dataset = Tag::filter($request)->paginate($request->item_count ?? $this->pageCount);

        return ($request->expectsJson() && !$request->view_render) ?
            response()->json($dataset) :
            view(($request->ajax()) ? 'admin.tags._list' : 'admin.tags.index', [
                'page_title' => 'Tags List',
                'dataset' => $dataset
            ]);
    }

    public function create() {
        return view('admin.tags.create', [
            'page_title' => "Tags Create",
        ]);
    }

    // Store a new Tag
    public function store(Request $request)
    {
        $attributes = $this->validateRequest($request);
        try {
            DB::beginTransaction();
            $data = Tag::create($attributes);
             // Add media to the product
            if ($request->hasFile('image')) {
                $data->addMedia($request->file('image'))
                ->toMediaCollection('image');
            }
            if ($request->hasFile('seo_image')) {
                $data->addMedia($request->file('seo_image'))
                ->toMediaCollection('seo_image');
            }

            DB::commit();
            $url = $request->submitter ? route('admin.blog.tags.index') : NULL;
            return $this->responseWithData($data, 'Record created successfully', 'success', 201, $url);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->responseWithError($e, $request);
        }
    }

    // Show a single Tag
    public function show(Tag $Tag)
    {
        return request()->expectsJson() ?
            response()->json($Tag) :
            view('categories.show', compact('Tag'));
    }

    public function edit($key) {
        $data = Tag::where('_key', $key)->first();
        return view('admin.tags.edit', [
            'page_title' => "Tags Edit",
            'data'=> $data
        ]);
    }
    // Update a Tag
    public function update(Request $request, $key)
    {
        $attributes = $this->validateRequest($request, $key);
        $data = Tag::where('_key', $key)->first();

        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                $data->clearMediaCollection('image');
                $data->addMedia($request->file('image'))
                ->toMediaCollection('image');
            }
            if ($request->hasFile('seo_image')) {
                 $data->clearMediaCollection('seo_image');
                $data->addMedia($request->file('seo_image'))
                ->toMediaCollection('seo_image');
            }

            $data->update($attributes);

            DB::commit();
            $url = $request->submitter ? route('admin.blog.tags.index') : NULL;
            return $this->responseWithData($data, 'Record updated successfully', 'success', 201, $url);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->responseWithError($e, $request);
        }
    }

    // Delete a Tag
    public function destroy($key)
    {
        $data = Tag::where('_key', $key)->first();
        if ($data) {
            $data->clearMediaCollection('image');
             $data->clearMediaCollection('seo_image');

            // Delete the tag record
            if (!$data->delete()) {
                throw new \Exception("Error while deleting tag record.");
            }
        }

        return $this->responseWithData($data, 'Record created successfully', 'success', 201);
    }

    public function delete(Request $request)
    {
        DB::beginTransaction();
        try {
            foreach ($request->data as $id) {
                $data = Tag::where('_key', $id)->first();
                if ($data) {
                    $data->clearMediaCollection('image');
                     $data->clearMediaCollection('seo_image');

                    // Delete the tag record
                    if (!$data->delete()) {
                        throw new \Exception("Error while deleting tag record.");
                    }
                }
            }
            DB::commit();
            return $this->responseWithMessage('Record deleted successfull', 200);
        } catch (\Exception $e) {
            DB::rollback();
            return $this->responseWithError($e, $request);
        }
    }

    // Helper method to validate request
    protected function validateRequest(Request $request, $ignoreKey = null)
    {
        return $request->validate([
            'name' => 'required|string|max:255|unique:tags,name,' . $ignoreKey . ',_key',
            'description' => 'nullable|string',
            'permalink' => 'required|string|unique:tags,permalink,' . $ignoreKey . ',_key',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:1000',
            'seo_image' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'status' => 'nullable|string|max:255',
            'submitter' => 'nullable|string|max:255',
            'is_index' => 'nullable|boolean',
        ]);
    }

    // Helper for JSON and redirect responses
    protected function responseWithData($data, $message, $status = 'success', $status_code = 200, $url = null)
    {
        return request()->expectsJson() ?
            response()->json(['message' => $message, 'status' => $status, 'data' => $data], $status_code) :
            ($url ? redirect($url)->with([
                'message' => 'Record created successfully!',
                'alert-type' => 'success',
                'status' => $status
            ]) : redirect()->back()->with([
                'message' => 'Record created successfully!',
                'alert-type' => 'success',
                'status' => $status
            ]));

            // return request()->expectsJson() ?

        //     response()->json(['message' => $message, 'data' => $data], $status) :
        //     ($url ? redirect($url)->with('toast', [
        //         'header' => 'Success',
        //         'message' => 'Record saved successfully!',
        //         'type' => 'bg-success',
        //         'placement' => 'top-0 end-0',
        //     ]) : redirect()->back()->with('toast', [
        //         'header' => 'Success',
        //         'message' => 'Record saved successfully!',
        //         'type' => 'bg-success',
        //         'placement' => 'top-0 end-0',
        //     ]));
    }

    protected function responseWithError(Exception $e, Request $request)
    {
        $status = $e->getCode() ?: 500;
        return $request->expectsJson() ?
            response()->json(['message' => $e->getMessage()], $status) :
            redirect()->back()->with([
                'message' => $e->getMessage(),
                'alert-type' => 'danger'
            ]);
    }

    protected function responseWithMessage($message, $status = 200)
    {
        return request()->expectsJson() ?
            response()->json(['message' => $message, 'status' => $status == 200 ? 'success' : 'error'], $status) :
            redirect()->back()->with([
                'message' => $message,
                'alert-type' => 'success',
                'status' => $status == 200 ? 'success' : 'error',
            ]);
    }
}
