<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function all(Request $request)
    {
        return view('admin.themes.index', [
                'page_title' => 'Themes List',
            ]);
    }
}
