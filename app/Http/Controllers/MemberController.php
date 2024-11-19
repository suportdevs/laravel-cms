<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $dataset = Member::filter($request)->paginate($request->item_count ?? $this->pageCount);

        return ($request->expectsJson() && !$request->view_render) ?
            response()->json($dataset) :
            view(($request->ajax()) ? 'admin.members._list' : 'admin.members.index', [
                'page_title' => 'Member List',
                'dataset' => $dataset
            ]);
    }

    public function create() {
        return view('admin.members.create', [
            'page_title' => "Member Create",
        ]);
    }

    // Store a new Member
    public function store(Request $request)
    {
        $attributes = $this->validateRequest($request);
        $attributes['dob'] = date('Y-m-d', strtotime($request->dob));
        $attributes['password'] = Hash::make($request->password);
        try {
            DB::beginTransaction();
            $data = Member::create($attributes);

             // Add media to the product
            if ($request->hasFile('image')) {
                $data->addMedia($request->file('image'))
                ->toMediaCollection('image');
            }

            DB::commit();
            $url = $request->submitter ? route('admin.blog.members.index') : route('admin.blog.members.edit', $data->_key);
            return $this->responseWithData($data, 'Record created successfully', 'success', 201, $url);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->responseWithError($e, $request);
        }
    }

    // Show a single Member
    public function show(Member $Member)
    {
        return request()->expectsJson() ?
            response()->json($Member) :
            view('posts.show', compact('Member'));
    }

    public function edit($key) {
        $data = Member::where('_key', $key)->first();
        return view('admin.members.edit', [
            'page_title' => "Member Edit",
            'data'=> $data,
        ]);
    }
    // Update a Member
    public function update(Request $request, $key)
    {
        $attributes = $this->validateRequest($request, $key);
        $attributes['dob'] = date('Y-m-d', strtotime($request->dob));
        $attributes['password'] = Hash::make($request->password);
        $data = Member::where('_key', $key)->first();

        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                $data->clearMediaCollection('image');
                $data->addMedia($request->file('image'))
                ->toMediaCollection('image');
            }

            $data->update($attributes);

            DB::commit();
            $url = $request->submitter ? route('admin.blog.members.index') : NULL;
            return $this->responseWithData($data, 'Record updated successfully', 'success', 201, $url);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->responseWithError($e, $request);
        }
    }

    // Delete a Member
    public function destroy($key)
    {
        $data = Member::where('_key', $key)->first();
        if ($data) {
            $data->clearMediaCollection('image');

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
                $data = Member::where('_key', $id)->first();
                if ($data) {
                    $data->clearMediaCollection('image');

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
        if($ignoreKey == null){
            return $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'description' => 'required|string',
                'phone' => 'nullable|string|max:15',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
                'dob' => 'nullable',
                'status' => 'nullable|string|max:255',
                'password' =>'required|string|min:8|confirmed',
                'password_confirmation' => 'required|string|min:8',
                'submitter' => 'nullable|string|max:255',
            ]);
        }else{
            return $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'description' => 'required|string',
                'phone' => 'nullable|string|max:15',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
                'dob' => 'nullable',
                'status' => 'nullable|string|max:255',
                'submitter' => 'nullable|string|max:255',
            ]);
        }
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
