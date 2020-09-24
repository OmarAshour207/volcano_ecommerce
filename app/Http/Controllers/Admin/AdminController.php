<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\Visitor;
use App\Models\WebsiteSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showDashboard()
    {
        $services_count = Service::all()->count();
        $contacts_count = Contact::all()->count();
        $testimonials_count = Testimonial::all()->count();
        $blogs_count = Blog::all()->count();

        $settings = WebsiteSetting::first();
        $visible_sections = count(unserialize($settings->page_filter));
        $hidden_sections = 8 - $visible_sections;
        $website_color = $this->getColorName($settings->color);

        $visitors = Visitor::all();
        $visitors_count = $visitors->count();
        $temp_most_visited = $this->getMostVisited(7);
        $most_visited = $temp_most_visited[0];
        $most_visited_page = $temp_most_visited[1];
        $pages_in_percentage = $this->getVisitedPagesInPercentage($visitors_count,7);

        $visited_pages_in_month = $this->getCountsPagesForStats(30);

        return view('dashboard.home', compact(
            'services_count',
                    'contacts_count', 'testimonials_count',
                     'blogs_count',
                    'visible_sections', 'hidden_sections',
                    'website_color', 'visitors_count',
                    'most_visited', 'most_visited_page',
                    'pages_in_percentage', 'visited_pages_in_month'
        ));
    }

    public function getCountsPagesForStats($days)
    {
        $pages = $this->getVisitedPages($days);
        return array_values($pages);
    }

    public function getVisitedPagesInPercentage($visitors_count, $days)
    {
        $pages = $this->getVisitedPagesAllTime();

        foreach ($pages as $index => $page) {
            $pages[$index] = round(($page / $visitors_count) * 100);
        }
        return $pages;
    }

    public function getVisitedPagesAllTime()
    {
        $visitors_data = Visitor::all();
        $pages = [
            'home'      => 0,
            'about'     => 0,
            'services'  => 0,
            'projects'  => 0,
            'blogs'     => 0,
            'contact-us'=> 0
        ];
        foreach ($visitors_data as $data) {
            foreach ($pages as $index => $page) {
                if ($data->page == $index) {
                    $pages[$index] += 1;
                }
            }
        }
        return $pages;
    }

    public function getVisitedPages($days)
    {
        // Most Visited through 1 week
        $date = Carbon::today()->subDays($days);
        $visitors_data = Visitor::where('created_at', '>=', $date)->get();
        $pages = [
            'home'      => 0,
            'about'     => 0,
            'services'  => 0,
            'blogs'     => 0,
            'contact-us'=> 0
        ];
        foreach ($visitors_data as $data) {
            foreach ($pages as $index => $page) {
                if ($data->page == $index) {
                    $pages[$index] += 1;
                }
            }
        }
        return $pages;
    }

    public function getMostVisited($days)
    {
        $data = [];
        // Most Visited through 1 week
        $date = Carbon::today()->subDays($days);
        $visitors_data = Visitor::where('created_at', '>=', $date)->get();
        $pages = [
            'home'      => 0,
            'about'     => 0,
            'services'  => 0,
            'blogs'     => 0,
            'contact-us'=> 0
        ];
        $most_visited = 0;
        $most_visited_page = '';
        foreach ($visitors_data as $data) {
            foreach ($pages as $index => $page) {
                if ($data->page == $index) {
                    $pages[$index] += 1;
                    if ($most_visited <= $pages[$index] ) {
                        $most_visited = $pages[$index];
                        $most_visited_page = $index;
                    }
                }
            }
        }
        $data = [$most_visited, $most_visited_page];
        return $data;
    }

    protected function getColorName($website_color)
    {
        $colors = [
            1     => __('admin.orange'),
            2     => __('admin.red'),
            3     => __('admin.yellow'),
            4     => __('admin.blue'),
            5     => __('admin.red_dark'),
            6     => __('admin.green'),
            7     => __('admin.sky'),
            8     => __('admin.orange_dark'),
        ];
        foreach ($colors as $index => $color) {
            if ($index == $website_color) {
                return $color;
            }
        }
    }
}
