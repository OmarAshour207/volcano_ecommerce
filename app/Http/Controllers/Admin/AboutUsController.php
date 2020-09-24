<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AboutUsController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('dashboard.abouts.index', compact('about'));
    }

    public function create()
    {
        return view('dashboard.abouts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'             => 'required|string',
            'description'       => 'required|string|min:10',
        ]);
        $data['image'] = $request->image;

        About::create($data);
        session()->flash('success', trans('admin.added_successfully'));
        return redirect()->route('about.index');
    }

    public function edit(About $about)
    {
        return view('dashboard.abouts.edit', compact('about'));
    }

    public function update(Request $request,About $about)
    {
        $data = $request->validate([
            'title'             => 'required|string',
            'description'       => 'required|string|min:10',
        ]);
        $data['image'] = $request->image;

        $about->update($data);
        session()->flash('success', trans('admin.updated_successfully'));
        return redirect()->route('about.index');
    }

    public function destroy(About $about)
    {
        Storage::disk('local')->delete('public/aboutus/'. $about->image);
        $about->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect()->route('about.index');
    }

}
