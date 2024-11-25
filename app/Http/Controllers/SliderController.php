<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        $dataset = Slider::filter($request)->paginate($request->item_count ?? $this->pageCount);

        return ($request->expectsJson() && !$request->view_render) ?
            response()->json($dataset) :
            view(($request->ajax()) ? 'admin.sliders._list' : 'admin.sliders.index', [
                'page_title' => 'Slider List',
                'dataset' => $dataset
            ]);
    }

    public function create() {
        return view('admin.sliders.create', [
            'page_title' => "Slider Create",
            'maxId' => Slider::max('id'),
        ]);
    }

    // Store a new Slider
    public function store(Request $request)
    {
        $attributes = $this->validateRequest($request);
        unset($attributes['image_icons']);
        try {
            DB::beginTransaction();
            $data = Slider::create($attributes);

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
            // Handle multiple image icons
            if ($request->hasFile('image_icons')) {
                foreach ($request->file('image_icons') as $imageIcon) {
                    $data->addMedia($imageIcon)
                        ->toMediaCollection('image_icons');
                }
            }

            DB::commit();
            $url = $request->submitter ? route('admin.sliders.index') : NULL;
            return $this->responseWithData($data, 'Record created successfully', 'success', 201, $url);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->responseWithError($e, $request);
        }
    }

    // Show a single Slider
    public function show(Slider $Slider)
    {
        return request()->expectsJson() ?
            response()->json($Slider) :
            view('sliders.show', compact('Slider'));
    }

    public function edit($key) {
        $data = Slider::where('_key', $key)->first();
        return view('admin.sliders.edit', [
            'page_title' => "Slider Edit",
            'data'=> $data,
        ]);
    }
    // Update a Slider
    public function update(Request $request, $key)
    {
        $attributes = $this->validateRequest($request, $key);
        $data = Slider::where('_key', $key)->first();

        try {
            DB::beginTransaction();
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
            // Handle multiple image icons
            if ($request->hasFile('image_icons')) {
                foreach ($request->file('image_icons') as $imageIcon) {
                    $data->addMedia($imageIcon)
                        ->toMediaCollection('image_icons');
                }
            }

            $data->update($attributes);

            DB::commit();
            $url = $request->submitter ? route('admin.sliders.index') : NULL;
            return $this->responseWithData($data, 'Record updated successfully', 'success', 201, $url);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->responseWithError($e, $request);
        }
    }

    // Delete a Slider
    public function destroy($key)
    {
        $data = Slider::where('_key', $key)->first();
        if ($data) {
            $data->clearMediaCollection('image');
            $data->clearMediaCollection('banner_image');
             $data->clearMediaCollection('seo_image');
             $data->clearMediaCollection('image_icons');

            // Delete the record
            if (!$data->delete()) {
                throw new \Exception("Error while deleting record.");
            }
        }

        return $this->responseWithData($data, 'Record created successfully', 'success', 201);
    }

    public function delete(Request $request)
    {
        DB::beginTransaction();
        try {
            foreach ($request->data as $id) {
                $data = Slider::where('_key', $id)->first();
                if ($data) {
                    $data->clearMediaCollection('image');
                    $data->clearMediaCollection('banner_image');
                    $data->clearMediaCollection('seo_image');
                    $data->clearMediaCollection('image_icons');

                    // Delete the record
                    if (!$data->delete()) {
                        throw new \Exception("Error while deleting  record.");
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
        $messages = [
            'image_icons.*.image' => 'Each file in the image icons field must be an image.',
            'image_icons.*.mimes' => 'Each image must be a file of type: jpg, jpeg, png.',
            'image_icons.*.dimensions' => 'Each image must have dimensions of at least 80x80 pixels.',
        ];

        return $request->validate([
            'name' => 'required|string|max:255|unique:sliders,name,' . $ignoreKey . ',_key',
            'content' => 'required|string',
            'permalink' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'image_icons' => 'nullable|array',
            // 'image_icons.*' => 'nullable|image|mimes:jpg,jpeg,png|max:1024|dimensions:max_width=80',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:1000',
            'seo_image' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'status' => 'nullable|string|max:255',
            'submitter' => 'nullable|string|max:255',
            'is_index' => 'nullable|boolean',
            'template' => 'required'
        ], $messages);
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
