<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::paginate(10);
        return view('dashboard.offers.index', compact('offers'));
    }

    public function create()
    {
        return view('dashboard.offers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'             => 'required|string',
            'value'             => 'required|numeric',
        ]);
        $data['image'] = $request->image;

        Offer::create($data);
        session()->flash('success', trans('admin.added_successfully'));
        return redirect()->route('offers.index');
    }

    public function edit(Offer $offer)
    {
        return view('dashboard.offers.edit', compact('offer'));
    }

    public function update(Request $request, Offer $offer)
    {
        $data = $request->validate([
            'title'             => 'required|string',
            'value'             => 'required|numeric',
        ]);
        $data['image'] = $request->image;

        $offer->update($data);
        session()->flash('success', trans('admin.updated_successfully'));
        return redirect()->route('offers.index');
    }

    public function destroy(Offer $offer)
    {
        if($offer->image){
            Storage::disk('local')->delete('public/offers/'. $offer->image);
        }
        $offer->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect()->route('offers.index');
    }
}
