<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $dataset = Menu::filter($request)->paginate($request->item_count ?? $this->pageCount);

        return ($request->expectsJson() && !$request->view_render) ?
            response()->json($dataset) :
            view(($request->ajax()) ? 'admin.menus._list' : 'admin.menus.index', [
                'page_title' => 'Menus List',
                'dataset' => $dataset
            ]);
    }

    public function create() {
        return view('admin.menus.create', [
            'page_title' => "Menus Create",
        ]);
    }

    // Store a new Menu
    public function store(Request $request)
    {
        $attributes = $this->validateRequest($request);
        try {
            DB::beginTransaction();
            $data = Menu::create($attributes);

            DB::commit();
            $url = $request->submitter ? route('admin.blog.menus.index') : route('admin.blog.menus.edit', $data->_key);
            return $this->responseWithData($data, 'Record created successfully', 'success', 201, $url);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->responseWithError($e, $request);
        }
    }

    // Show a single Menu
    public function show(Menu $Menu)
    {
        return request()->expectsJson() ?
            response()->json($Menu) :
            view('categories.show', compact('Menu'));
    }

    public function edit($key) {
        $data = Menu::where('_key', $key)->first();
        return view('admin.menus.edit', [
            'page_title' => "Menus Edit",
            'pages'=> Page::pluck('name', 'id'),
            'categories'=> Category::pluck('name', 'id'),
            'tags'=> Tag::pluck('name', 'id'),
            'data'=> $data
        ]);
    }
    // Update a Menu
    public function update(Request $request, $key)
    {
        $attributes = $this->validateRequest($request, $key);
        $data = Menu::where('_key', $key)->first();

        try {
            DB::beginTransaction();

            $data->update($attributes);

            DB::commit();
            $url = $request->submitter ? route('admin.blog.menus.index') : NULL;
            return $this->responseWithData($data, 'Record updated successfully', 'success', 201, $url);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->responseWithError($e, $request);
        }
    }

    // Delete a Menu
    public function destroy($key)
    {
        $data = Menu::where('_key', $key)->first();
        if ($data) {
            // Delete the menu record
            if (!$data->delete()) {
                throw new \Exception("Error while deleting menu record.");
            }
        }

        return $this->responseWithData($data, 'Record created successfully', 'success', 201);
    }

    public function delete(Request $request)
    {
        DB::beginTransaction();
        try {
            foreach ($request->data as $id) {
                $data = Menu::where('_key', $id)->first();
                if ($data) {
                    // Delete the menu record
                    if (!$data->delete()) {
                        throw new \Exception("Error while deleting menu record.");
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
            'name' => 'required|string|max:255|unique:menus,name,' . $ignoreKey . ',_key',
            'dataset' => 'nullable|string',
            'location' => 'nullable|string',
            'status' => 'nullable|string|max:255',
            'submitter' => 'nullable|string|max:255',
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
