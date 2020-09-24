<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function clearAll()
    {
        DB::table('contact_notifications')
            ->where('status', '=', 0)
            ->update(array('status' => 1));

        session()->flash( __('admin.updated_successfully') );
        return redirect()->back();
    }

    public function viewAll()
    {
        $notifications = ContactNotification::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.contacts.notification', compact('notifications'));
    }
}
