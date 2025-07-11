<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifications;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin'])->except(['index', 'show']);
    }

    public function index()
    {
        $notifications = Notifications::latest()->get();
        return view('notifications.index', compact('notifications'));
    }

    public function create()
    {
        return view('notifications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Notifications::create($request->all());

        return redirect()->route('notifications.index')->with('success', 'تم إنشاء الإشعار بنجاح');
    }

    public function show(Notifications $notification)
    {
        return view('notifications.show', compact('notification'));
    }

    public function edit(Notifications $notification)
    {
        return view('notifications.edit', compact('notification'));
    }

    public function update(Request $request, Notifications $notification)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $notification->update($request->all());

        return redirect()->route('notifications.index')->with('success', 'تم تحديث الإشعار بنجاح');
    }

    public function destroy(Notifications $notification)
    {
        $notification->delete();

        return redirect()->route('notifications.index')->with('success', 'تم حذف الإشعار بنجاح');
    }
}
