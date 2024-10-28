<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = auth()->guard()->user()->notifications()->latest()->paginate(10);
        return view('notifications.index', compact('notifications'));
    }

    public function markAsRead(Notification $notification)
    {
        $notification->update(['is_read' => true]);
        return back();
    }

    public function markAllAsRead()
    {
        auth()->user()->notifications()->update(['is_read' => true]);
        return back();
    }
}
