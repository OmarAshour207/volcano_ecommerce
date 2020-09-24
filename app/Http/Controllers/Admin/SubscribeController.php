<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.subscribers.index', compact('subscribers'));
    }

    public function create()
    {
        return view('dashboard.subscribers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email'       => 'required|string|email',
        ]);

        Subscriber::create($data);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->route('subscribers.index');
    }

    public function edit(Subscriber $subscriber)
    {
        return view('dashboard.subscribers.edit', compact('subscriber'));
    }

    public function update(Subscriber $subscriber, Request $request)
    {
        $data = $request->validate([
            'email'       => 'required|string|email',
        ]);

        $subscriber->update($data);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('subscribers.index');
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('subscribers.index');
    }

}
