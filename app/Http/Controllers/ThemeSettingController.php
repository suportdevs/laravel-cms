<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class ThemeSettingController extends Controller
{
    public function index(Request $request)
    {
        $data = Setting::first();
        return view('admin.theme_settings.index', [
                'page_title' => 'Theme Settings',
                'data'=> $data
            ]);
    }

    // Store a new theme settings
    public function store(Request $request)
    {
        $attributes = $this->validateRequest($request);

        try {
            DB::beginTransaction();
            // Remove 'column' from the request and structure attributes
            $attributes = $request->except('column');
            $attributes[$request->column] = $attributes;

            // Retrieve existing record or create a new one
            $existingRecord = Setting::first();

            if ($existingRecord) {
                $existingRecord->update($attributes);
                $data = $existingRecord;
            } else {
                $data = Setting::create($attributes);
            }

            // Handle file uploads
            if ($request->hasFile('banner_image')) {
                $data->clearMediaCollection('banner_image');
                $data->addMedia($request->file('banner_image'))
                    ->toMediaCollection('banner_image');
            }

            if ($request->hasFile('seo_image')) {
                $data->clearMediaCollection('banner_image');
                $data->addMedia($request->file('seo_image'))
                    ->toMediaCollection('seo_image');
            }

            if ($request->hasFile('facicon')) {
                $data->clearMediaCollection('facicon');
                $data->addMedia($request->file('facicon'))
                    ->toMediaCollection('facicon');
            }
            if ($request->hasFile('logo')) {
                $data->clearMediaCollection('logo');
                $data->addMedia($request->file('logo'))
                    ->toMediaCollection('logo');
            }

            DB::commit();

            // Determine the redirect URL if submitter is present
            $url = $request->submitter ? route('admin.blog.tags.index') : null;

            return $this->responseWithData($data, 'Record saved successfully', 'success', 201, $url);

        } catch (Exception $e) {
            DB::rollBack();

            return $this->responseWithError($e, $request);
        }
    }


    // Helper method to validate request
    protected function validateRequest(Request $request, $ignoreKey = null)
    {
        return $request->validate([
            'column' => 'required|string',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'seo_image' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'favicon' => 'nullable|image|mimes:jpg,jpeg,png|max:1024|dimensions:max_width=60',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:1024|dimensions:max_width=120',
        ]);
    }

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
}
