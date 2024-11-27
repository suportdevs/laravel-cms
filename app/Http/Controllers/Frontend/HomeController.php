<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\ShortcodeParser;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Page;

class HomeController extends Controller{


    public function index() {

        $sliders = Slider::select('id', 'name', 'content', 'image', 'banner_image', 'image_icons', 'permalink')->orderBy('id', 'DESC')->limit(5)->get();
        $categories = Category::orderBy('id', 'DESC')->get();
        // pr($sliders);
        return view('frontend.home', [
            'sliders' => $sliders,
            'categories' => $categories,
        ]);
    }

    public function page($permalink)
    {
        $page = Page::where('permalink', $permalink)->first();

        if (!$page) {
            // Return a custom 404 view
            return response()->view('errors.404', [], 404);
        }

        // Parse the content using the ShortcodeParser
        $pageContent = ShortcodeParser::parse($page->content);

        return view('frontend.page', [
            'page' => $page,
            'pageContent' => $pageContent,
        ]);
    }
}
