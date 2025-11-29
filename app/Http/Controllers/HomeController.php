<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Certificate;
use App\Models\Product;
use App\Models\Section;
use App\Models\Service;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::active()->get();
        $services = Service::active()->get();
        $products = Product::active()->featured()->get();
        $blogs = Blog::active()->limit(4)->get();

        return view('front.home', compact('sliders', 'services', 'products', 'blogs'));
    }

    public function about()
    {
        $services = Service::active()->get();
        $mission = Section::where('slug', 'mission')->active()->first();
        $vision = Section::where('slug', 'vision')->active()->first();
        $strategy = Section::where('slug', 'strategy')->active()->first();

        return view('front.about', compact('services', 'mission', 'vision', 'strategy'));
    }

    public function products($category_id = null)
    {
        $category = null;
        if (isset($category_id) && $category_id != null) {
            $category = Category::find($category_id);
            $products = $category->products()->paginate(12);
        } else {
            $products = Product::active()->paginate(12);
        }

        return view('front.products', compact('category', 'products'));
    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->active()->firstOrFail();
        $related_products = $product->category->products;

        return view('front.product_details', compact('product', 'related_products'));
    }

    public function blog()
    {
        $blogs = Blog::active()->paginate(3);
        $recent_blogs = Blog::active()->limit(5)->get();
        $products = Product::active()->featured()->get();

        return view('front.blog', compact('blogs', 'recent_blogs', 'products'));
    }

    public function blog_details($slug)
    {
        $blog = Blog::where('slug', $slug)->active()->firstOrFail();
        $recent_blogs = Blog::active()->limit(5)->get();
        $products = Product::active()->featured()->get();

        return view('front.blog_details', compact('blog', 'recent_blogs', 'products'));
    }

    public function certifications()
    {
        $certifications = Certificate::active()->get();

        return view('front.certifications', compact('certifications'));
    }

    public function contact_us()
    {
        return view('front.contact');
    }
}
