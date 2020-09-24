<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('dashboard.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'          => 'required|string',
            'old_password'  => 'sometimes|nullable',
            'new_password'  => 'sometimes|nullable|min:6|required_with:confirm_new_password|same:confirm_new_password',
        ]);
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);

        if ($request->old_password) {
            if(Hash::check($request->old_password, $user->password)) {
                $user->password = bcrypt($request->new_password);
            }
        }
        $user->name = $request->name;
        $user->image = $request->image;
        $user->update();
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->back();
    }
}
