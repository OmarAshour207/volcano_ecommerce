<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Attribute;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.attributes.index', compact('attributes'));
    }

    public function create()
    {
        return view('dashboard.attributes.create');
    }

    public function store(Request $request, Attribute $attribute)
    {
        $request->validate([
            'name'              => 'required|string',
        ]);

        Attribute ::create($request->only('name'));
        session()->flash('success', trans('admin.added_successfully'));
        return redirect()->route('attributes.index');

    }

    public function edit(Attribute $attribute)
    {
        return view('dashboard.attributes.edit', compact('attribute'));
    }

    public function update(Request $request, Attribute $attribute)
    {
        $request->validate([
            'name'              => 'required|string',
        ]);

        $attribute->update($request->only('name'));
        session()->flash('success', trans('admin.updated_successfully'));
        return redirect()->route('attributes.index');
    }

    public function destroy(Attribute $attribute)
    {
        $attribute->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect()->route('attributes.index');
    }
}
