<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $dataset = Category::filter($request)->paginate($request->item_count ?? $this->pageCount);

        return ($request->expectsJson() && !$request->view_render) ?
            response()->json($dataset) :
            view(($request->ajax()) ? 'admin.categories._list' : 'admin.categories.index', [
                'page_title' => 'Category List',
                'dataset' => $dataset
            ]);
    }

    public function create() {
        return view('admin.categories.create', [
            'page_title' => "Category Create",
            'categories' => Category::with('children')->whereNull('parent_id')->get(),
        ]);
    }

    // Store a new Category
    public function store(Request $request)
    {
        $attributes = $this->validateRequest($request);
        try {
            DB::beginTransaction();
            $data = Category::create($attributes);
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
            $url = $request->submitter ? route('admin.blog.categories.index') : NULL;
            return $this->responseWithData($data, 'Record created successfully', 'success', 201, $url);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->responseWithError($e, $request);
        }
    }

    // Show a single Category
    public function show(Category $Category)
    {
        return request()->expectsJson() ?
            response()->json($Category) :
            view('categories.show', compact('Category'));
    }

    public function edit($key) {
        $data = Category::where('_key', $key)->first();
        return view('admin.categories.edit', [
            'page_title' => "Category Edit",
            'categories' => Category::with('children')->whereNull('parent_id')->get(),
            'data'=> $data,
        ]);
    }
    // Update a Category
    public function update(Request $request, $key)
    {
        $attributes = $this->validateRequest($request, $key);
        $data = Category::where('_key', $key)->first();

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
            $url = $request->submitter ? route('admin.blog.categories.index') : NULL;
            return $this->responseWithData($data, 'Record updated successfully', 'success', 201, $url);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->responseWithError($e, $request);
        }
    }

    // Delete a Category
    public function destroy($key)
    {
        $data = Category::where('_key', $key)->first();
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
                $data = Category::where('_key', $id)->first();
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
            'parent_id' => 'nullable:int',
            'name' => 'required|string|max:255|unique:categories,name,' . $ignoreKey . ',_key',
            'description' => 'nullable|string',
            'permalink' => 'required|string|unique:categories,permalink,' . $ignoreKey . ',_key',
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
