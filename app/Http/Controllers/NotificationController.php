<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __invoke()
    {
        return view('notificatoins.show' , ['notifications' => tap(current_user()->unReadNotifications()->latest()->paginate(10))->markAsRead()]);
    }
}
