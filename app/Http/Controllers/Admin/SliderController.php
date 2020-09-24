<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::paginate(10);
        return view('dashboard.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('dashboard.slider.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'             => 'required|string',
            'description'       => 'required|string|min:10',
        ]);
        $data['image'] = $request->image;

        Slider::create($data);
        session()->flash('success', trans('admin.added_successfully'));
        return redirect()->route('slider.index');
    }

    public function edit(Slider $slider)
    {
        return view('dashboard.slider.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $data = $request->validate([
            'title'             => 'required|string',
            'description'       => 'required|string|min:10',
        ]);
        $data['image'] = $request->image;

        $slider->update($data);
        session()->flash('success', trans('admin.added_successfully'));
        return redirect()->route('slider.index');
    }

    public function destroy(Slider $slider)
    {
        if($slider->image){
            Storage::disk('local')->delete('public/sliders/'. $slider->image);
        }
        $slider->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect()->route('slider.index');
    }
}
