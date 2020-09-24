<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(10);
        return view('dashboard.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('dashboard.blogs.create');
    }

    public function store(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'author'             => 'sometimes|nullable|string',
            'title'              => 'required|string',
            'content'            => 'required|string|min:10',
            'meta_tag'           => 'required|string',
        ]);
        $data['image'] = $request->image;

        Blog::create($data);
        session()->flash('success', trans('admin.added_successfully'));
        return redirect()->route('blogs.index');

    }

    public function edit(Blog $blog)
    {
        return view('dashboard.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'author'             => 'sometimes|nullable|string',
            'title'              => 'required|string',
            'content'            => 'required|string|min:10',
            'meta_tag'           => 'required|string',
        ]);
        $data['image'] = $request->image;

        $blog->update($data);
        session()->flash('success', trans('admin.updated_successfully'));
        return redirect()->route('blogs.index');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image != null) {
            Storage::disk('local')->delete('public/blogs/' . $blog->image);
        }
        $blog->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect()->route('blogs.index');
    }

}
