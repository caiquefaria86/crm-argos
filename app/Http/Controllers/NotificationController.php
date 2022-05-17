<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    public function notifications(Request $request)
    {
        $userId = Auth::user()->id;

        $user = User::findOrFail($userId);

        $notifications = DB::table('notifications')->where('notifiable_id', $userId)->where('read_at', null)->get();


        $viewRender = view('layouts.partials.notifications', [
            'notifications' => $notifications
        ])->render();

        return response()->json([
            'success'   => true,
            'html'      => $viewRender,
            'notifications' =>$notifications
        ]);
    }

    public function notificationsBadge()
    {
        $userId = Auth::user()->id;

        $user = User::findOrFail($userId);

        $notifications = DB::table('notifications')->where('notifiable_id', $userId)->where('read_at', null)->get();

        $notifications = $notifications->count();

        return response()->json([
            'success'   => true,
            'notifications' =>$notifications
        ]);
    }

    public function notificationRead(Request $request)
    {
        $notificationId = $request->notifId;

        $datetimeNow = new DateTime();

        try {

            $notif = DB::table('notifications')
                            ->where('id', $notificationId)
                            ->update(['read_at' => $datetimeNow]);

            return response()->json([
                'success'   => true,
            ]);

        } catch (\Throwable $th) {

            return response()->json([
                'success'   => false,
            ]);

        }
    }
}
