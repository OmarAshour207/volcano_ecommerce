<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Contactus;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Service;
use App\Models\Slider;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\Visitor;
use App\Models\WebsiteSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function changeLanguage($language)
    {
        session()->has('lang') ? session()->forget('lang') : '';
        $language == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
        return redirect()->back();
    }

    public function HomePage()
    {
        $this->checkVisitor();

        session('lang') ?? session()->put('lang', app()->getLocale());

        $websiteSettings = WebsiteSetting::first();
        $page_filter = $websiteSettings->page_filter != null ? unserialize($websiteSettings->page_filter) : '';
        $aboutUs = About::first();
        $contactUs = Contactus::first();
        $services = Service::orderBy('id', 'desc')->limit(4)->get();
        $testimonials = Testimonial::orderBy('id', 'desc')->limit(2)->get();
        $blogs = Blog::orderBy('id', 'desc')->limit(3)->get();
        $sliders = Slider::orderBy('id', 'desc')->limit(2)->get();
        $offers = Offer::orderBy('id', 'desc')->limit(3)->get();
        $categories = Category::orderBy('id', 'desc')->limit(4)->get();
        $products = Product::orderBy('id', 'desc')->limit(4)->get();

        $services_count = Service::all()->count();

        return view('site.home',
                    compact('page_filter', 'sliders',
                            'aboutUs', 'contactUs',
                            'services', 'testimonials',
                            'blogs', 'services_count',
                            'offers', 'categories',
                            'products'));
    }

    public function checkVisitor()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $page = \Request::segment(1) ?? 'home';

        $visitors = DB::table('visitors')
                ->where('ip', $ip)
                ->where('page', $page)
                ->latest()
                ->first();

        if($visitors != null) {
            $created = Carbon::parse($visitors->created_at);

            if(!$created->isCurrentDay()) {
                $this->createVisitor($ip, $page);
            }
        }else {
            $this->createVisitor($ip, $page);
        }
    }

    protected function createVisitor($ip, $page)
    {
        Visitor::create([
            'ip'    => $ip,
            'page'  => $page
        ]);
    }

    public function aboutPage()
    {
        $this->checkVisitor();
        $aboutUs = About::first();
        $testimonials = Testimonial::orderBy('id', 'desc')->limit(3)->get();
        $services = Service::orderBy('id', 'desc')->limit(6)->get();
        $blogs = Blog::orderBy('id', 'desc')->limit(4)->get();
        $teamMembers = TeamMember::orderBy('id', 'desc')->limit(4)->get();

        $services_count = Service::all()->count();

        return view('site.about',
            compact('aboutUs', 'testimonials',
                    'services', 'services_count',
                    'blogs', 'teamMembers'));
    }

    public function blogsPage()
    {
        $this->checkVisitor();
        $blogs = Blog::orderBy('id', 'desc')->paginate(10);
        $aboutUs = About::first();
        $recentBlogs = Blog::latest()->limit(4)->get();

        return view('site.blogs',
                compact('blogs' , 'aboutUs',
                                'recentBlogs'));
    }

    public function showBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $recentBlogs = Blog::latest()->limit(4)->get();
        $aboutUs = About::first();

        return view('site.single_blog',
                compact('blog', 'recentBlogs',
                                'aboutUs'));
    }

    public function contact()
    {
        $this->checkVisitor();
        $contactUs = Contactus::first();
        $blogs = Blog::orderBy('id', 'desc')->limit(3)->get();
        $aboutUs = About::first();

        return view('site.contact',
                compact('contactUs', 'blogs', 'aboutUs'));
    }

    public function categoryProducts(Request $request)
    {
        $products = Product::whenSearchPrice($request->price)
                ->whenSearchName($request->name)
                ->where('category_id', $request->route('id'))
                ->paginate(12);

        $categories = Category::withCount('products')->orderBy('id', 'desc')->get();
        $aboutUs = About::first();

        return view('site.category_products',
                compact('products', 'aboutUs',
                                'categories'));
    }

}
