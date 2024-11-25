<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Member;
use App\Models\Page;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $pageCount = Page::count();
        $sliderCount = Slider::count();
        $categoryCount = Category::count();
        $tagCount = Tag::count();
        $postCount = Post::count();
        $gallaryCount = Gallery::count();
        $memberCount = Member::count();

        return view(($request->ajax()) ? 'admin.home' : 'admin.home', [
                'page_title' => 'Dashboard',
                'pageCount' => $pageCount,
                'sliderCount' => $sliderCount,
                'categoryCount' => $categoryCount,
                'tagCount' => $tagCount,
                'postCount' => $postCount,
                'gallaryCount' => $gallaryCount,
                'memberCount' => $memberCount,
            ]);
    }
}
