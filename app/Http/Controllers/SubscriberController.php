<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'email'         => 'required|string|email'
        ]);

        Subscriber::create($data);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->back();
    }
}
