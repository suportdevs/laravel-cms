<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $dataset = Post::filter($request)->with('categories:id,name,_key', 'tags:id,name,_key')->paginate($request->item_count ?? $this->pageCount);

        return ($request->expectsJson() && !$request->view_render) ?
            response()->json($dataset) :
            view(($request->ajax()) ? 'admin.posts._list' : 'admin.posts.index', [
                'page_title' => 'Post List',
                'dataset' => $dataset
            ]);
    }

    public function create() {
        return view('admin.posts.create', [
            'page_title' => "Post Create",
            'categories' => Category::with('children')->whereNull('parent_id')->get(),
            'tags' => Tag::pluck('name', 'id'),
        ]);
    }

    // Store a new Post
    public function store(Request $request)
    {
        $attributes = $this->validateRequest($request);
        $attributes['is_featured'] = $request->is_featured ? 1 : 0;
        try {
            DB::beginTransaction();
            $data = Post::create($attributes);
            // Attach Categories
            if ($request->has('categories')) {
                $data->categories()->sync($request->categories);
            }

            // Attach Tags
            if ($request->has('tags')) {
                $data->tags()->sync($request->tags);
            }
             // Add media to the product
            if ($request->hasFile('image')) {
                $data->addMedia($request->file('image'))
                ->toMediaCollection('image');
            }
            if ($request->hasFile('banner_image')) {
                $data->addMedia($request->file('banner_image'))
                ->toMediaCollection('banner_image');
            }
            if ($request->hasFile('seo_image')) {
                $data->addMedia($request->file('seo_image'))
                ->toMediaCollection('seo_image');
            }

            DB::commit();
            $url = $request->submitter ? route('admin.blog.posts.index') : NULL;
            return $this->responseWithData($data, 'Record created successfully', 'success', 201, $url);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->responseWithError($e, $request);
        }
    }

    // Show a single Post
    public function show(Post $Post)
    {
        return request()->expectsJson() ?
            response()->json($Post) :
            view('posts.show', compact('Post'));
    }

    public function edit($key) {
        $data = Post::where('_key', $key)->first();
        return view('admin.posts.edit', [
            'page_title' => "Post Edit",
            'categories' => Category::with('children')->whereNull('parent_id')->get(),
            'tags' => Tag::pluck('name', 'id'),
            'data'=> $data,
        ]);
    }
    // Update a Post
    public function update(Request $request, $key)
    {
        $attributes = $this->validateRequest($request, $key);
        $attributes['is_featured'] = $request->is_featured ? 1 : 0;
        $data = Post::where('_key', $key)->first();

        try {
            DB::beginTransaction();
            // Sync Categories
            if ($request->has('categories')) {
                $data->categories()->sync($request->categories);
            }

            // Sync Tags
            if ($request->has('tags')) {
                $data->tags()->sync($request->tags);
            }

            if ($request->hasFile('image')) {
                $data->clearMediaCollection('image');
                $data->addMedia($request->file('image'))
                ->toMediaCollection('image');
            }
            if ($request->hasFile('banner_image')) {
                $data->clearMediaCollection('banner_image');
                $data->addMedia($request->file('banner_image'))
                ->toMediaCollection('banner_image');
            }
            if ($request->hasFile('seo_image')) {
                 $data->clearMediaCollection('seo_image');
                $data->addMedia($request->file('seo_image'))
                ->toMediaCollection('seo_image');
            }

            $data->update($attributes);

            DB::commit();
            $url = $request->submitter ? route('admin.blog.posts.index') : NULL;
            return $this->responseWithData($data, 'Record updated successfully', 'success', 201, $url);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->responseWithError($e, $request);
        }
    }

    // Delete a Post
    public function destroy($key)
    {
        $data = Post::where('_key', $key)->first();
        if ($data) {
            $data->clearMediaCollection('image');
            $data->clearMediaCollection('banner_image');
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
                $data = Post::where('_key', $id)->first();
                if ($data) {
                    $data->clearMediaCollection('image');
                    $data->clearMediaCollection('banner_image');
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

    public function imageUpload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename);

            $url = Storage::url($path);

            return response()->json([
                'uploaded' => 1,
                'fileName' => $filename,
                'url' => $url,
            ]);
        }

        return response()->json(['uploaded' => 0, 'error' => ['message' => 'File upload failed.']]);
    }

    // Helper method to validate request
    protected function validateRequest(Request $request, $ignoreKey = null)
    {
        return $request->validate([
            'categories' => 'required',
            'tags' => 'required',
            'name' => 'required|string|max:255|unique:posts,name,' . $ignoreKey . ',_key',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'permalink' => 'required|string|unique:posts,permalink,' . $ignoreKey . ',_key',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:1000',
            'seo_image' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'status' => 'nullable|string|max:255',
            'submitter' => 'nullable|string|max:255',
            'is_index' => 'nullable|boolean',
            'is_featured' => 'nullable',
            'published_at' => 'nullable',
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
