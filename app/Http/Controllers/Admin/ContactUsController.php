<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contactus;

class ContactUsController extends Controller
{
    public function index()
    {
        $contactus = Contactus::paginate(10);
        return view('dashboard.contactus.index', compact('contactus'));
    }

    public function create()
    {
        return view('dashboard.contactus.create');
    }

    public function store(Request $request, Contactus $contactus)
    {
        $data = $request->validate([
            'ar_description'       => 'required|string|min:10',
            'en_description'       => 'required|string|min:10',
        ]);

        Contactus::create($data);
        session()->flash('success', trans('admin.added_successfully'));
        return redirect()->route('contactus.index');
    }

    public function edit(Contactus $contactu)
    {
        return view('dashboard.contactus.edit', compact('contactu'));
    }

    public function update(Request $request, Contactus $contactu)
    {
        $data = $request->validate([
            'ar_description'       => 'required|string|min:10',
            'en_description'       => 'required|string|min:10',
        ]);

        $contactu->update($data);
        session()->flash('success', trans('admin.added_successfully'));
        return redirect()->route('contactus.index');
    }

    public function destroy(Contactus $contactu)
    {
        $contactu->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect()->route('contactus.index');
    }
}
