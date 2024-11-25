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
            $url = $request->submitter ? route('admin.menus.index') : route('admin.menus.edit', $data->_key);
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
    function buildNestedMenu(array $items, $parentId = null)
    {
        $nested = [];
        foreach ($items as $item) {
            if ($item['parent_id'] == $parentId) {
                $children = $this->buildNestedMenu($items, $item['id']);
                if ($children) {
                    $item['children'] = $children;
                }
                $nested[] = $item;
            }
        }
        return $nested;
    }
    public function edit($key) {
        $data = Menu::where('_key', $key)->first();
        $nestedMenu = $this->buildNestedMenu(json_decode($data->dataset ?? '{}', true));
        return view('admin.menus.edit', [
            'page_title' => "Menus Edit",
            'pages'=> Page::select('name', 'id', 'permalink')->get(),
            'categories'=> Category::select('name', 'id', 'permalink')->get(),
            'tags'=> Tag::select('name', 'id', 'permalink')->get(),
            'data'=> $data,
            'nestedMenu' => $nestedMenu
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
            $url = $request->submitter ? route('admin.menus.index') : NULL;
            return $this->responseWithData($data, 'Record updated successfully', 'success', 201, $url);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->responseWithError($e, $request);
        }
    }

    // Store a new Menu
    public function get_node(Request $request)
    {
        // pr(json_encode($request->dataset));
        // $attributes = $this->validateRequest($request);
        try {
            DB::beginTransaction();
            $data = Menu::find($request->menu_id);
            if (is_null($data->dataset)) {
                $preparedDataset = collect($request->dataset)->map(function ($item, $key) {
                    return [
                        'id' => $key + 1,
                        'parent_id' => null,
                    ] + $item;
                })->toArray();

                $data->dataset = json_encode($preparedDataset);
            } else {
                $exist_dataset = json_decode($data->dataset, true);
                $nextId = collect($exist_dataset)->max('id') + 1;
                $preparedDataset = collect($request->dataset)->map(function ($item, $key) use ($nextId) {
                    return [
                        'id' => $nextId + $key,
                        'parent_id' => null,
                    ] + $item;
                })->toArray();

                $new_dataset = array_merge($exist_dataset, $preparedDataset);
                $data->dataset = json_encode($new_dataset);
            }

            if(!$data->save()){
                throw new \Exception("Something went wrong while saving the menu dataset!");
            }

            DB::commit();
            return view('admin.menus.partial', [
                'data' => $data,
                'status' => 'Success',
                'message' => 'Record saved successfull.'
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->responseWithError($e, $request);
        }
    }

    public function save_structure(Request $request)
    {
        $id = $request->id;
        $menus = $request->menus;

        $data = Menu::find($id);
        $dataset = $menus;
        $nextId = 1;
        $preparedDataset = $this->prepareMenuDataset($dataset, $nextId);
        $data->dataset = json_encode($preparedDataset);
        $data->status = $request->status;
        $data->locations = $request->locations ? $request->locations : NULL;

        if (!$data->save()) {
            throw new \Exception("Something went wrong while saving the menu dataset!");
        }

        return response()->json([
            'message' => 'Menu structure saved successfully!',
        ]);
    }

    function prepareMenuDataset(array $items, int &$startId = 1, int $parentId = null, int $order = 1)
    {
        $prepared = [];
        foreach ($items as $index => $item) {
            // Assign a unique ID and order
            $currentId = $startId++;
            $preparedItem = [
                'id' => $currentId,
                'title' => $item['title'],
                'permalink' => $item['permalink'],
                'icon_font' => $item['icon_font'],
                'css_class' => $item['css_class'],
                'target' => $item['target'],
                'reference' => $item['reference'] ?? null,
                'label' => $item['label'],
                'model_id' => $item['model_id'],
                'parent_id' => $parentId, // Set the parent ID
                'order' => $index + 1,   // Set the order property (1-based index)
            ];

            $prepared[] = $preparedItem;

            // Recursively process children, if any
            if (!empty($item['children'])) {
                $prepared = array_merge(
                    $prepared,
                    $this->prepareMenuDataset($item['children'], $startId, $currentId)
                );
            }
        }
        return $prepared;
    }


    private function saveMenuWithOrder($id, $menuData, $parentId)
    {
        // Create or update the menu with the generated order
        $menu = Menu::updateOrCreate(
            ['id' => $id],
            [
                'parent_id' => $parentId,
                'order' => $menuData['order'],
                'title' => $menuData['title'] ?? '',
                'link' => $menuData['link'] ?? ''
            ]
        );

        // If there are children, handle them recursively
        if (isset($menuData['children']) && is_array($menuData['children'])) {
            $_c_order = 1;
            foreach ($menuData['children'] as $childMenuData) {
                $childMenuData['order'] = $_c_order;
                $this->saveMenuWithOrder($childMenuData, $menu->id);
                $_c_order++;
            }
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
