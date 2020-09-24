<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
class LogoController extends Controller
{
    public function index()
    {
        $logos = Logo::paginate(10);
        return view('dashboard.logos.index', compact('logos'));
    }

    public function create()
    {
        return view('dashboard.logos.create');
    }

    public function store(Request $request)
    {

        Logo::create([
            'image'     => $request->image
        ]);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->route('logos.index');
    }

    public function edit(Logo $logo)
    {
        return view('dashboard.logos.edit', compact('logo'));
    }

    public function update(Request $request, Logo $logo)
    {
        $data['image'] = $request->image;

        $logo->update($data);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('logos.index');
    }

    public function destroy(Logo $logo)
    {
        if($logo->image != null) {
            Storage::disk('local')->delete('public/logos/' . $logo->image);
        }
        $logo->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('logos.index');
    }
}
