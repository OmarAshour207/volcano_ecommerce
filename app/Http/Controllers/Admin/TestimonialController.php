<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::paginate(10);
        return view('dashboard.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('dashboard.testimonials.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string',
            'title'         => 'required|string',
            'description'   => 'required|string|min:10',
            'meta_tag'      => 'required|string',
        ]);

        $data['image'] = $request->image;

        Testimonial::create($data);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->route('testimonials.index');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('dashboard.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'name'          => 'required|string',
            'title'         => 'required|string',
            'description'   => 'required|string|min:10',
            'meta_tag'      => 'required|string',
        ]);
        $data['image'] = $request->image;

        $testimonial->update($data);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('testimonials.index');
    }

    public function destroy(Testimonial $testimonial)
    {
        if($testimonial->image != null) {
            Storage::disk('local')->delete('public/testimonials/' . $testimonial->image);
        }
        $testimonial->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('testimonials.index');
    }
}
