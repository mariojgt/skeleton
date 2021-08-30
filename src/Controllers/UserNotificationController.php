<?php

namespace Mariojgt\Unityuser\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserNotificationController extends Controller
{
    public function readAllNotification()
    {
        // Read all user notifications

        Auth::user()->unreadNotifications->map(function ($n) {
            $n->delete();
        });

        return redirect()->back();
    }

    public function readNotification($notification)
    {
        $notification = Auth::user()->notifications()->find($notification);

        return view('unity-user::content.app.notification.index', compact('notification'));
    }

    public function deleteNotification($notification)
    {
        Auth::user()->notifications()->find($notification)->delete();

        return redirect()->route('home_dashboard')->with('success', 'Deleted with success.');
    }

    public function markReadNotification($notification)
    {
        Auth::user()->notifications()->find($notification)->markAsRead();

        return redirect()->back()->with('success', 'Read with success.');
    }
}
