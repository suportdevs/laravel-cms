<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Slider;
use App\Models\Category;

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
}
