<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\TestNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class SendNotifyController extends Controller
{
    public function send_notify()
    {

        // $url = "http://hotsms.ps/sendbulksms.php?api_token=5f0c17773c6d4&sender=SMS&mobile=97259000000&type=0&text=Welcome";
        // $res = Http::get("http://hotsms.ps/sendbulksms.php", [
        //     'user_name' => 'test7',
        //     'user_pass' => '8727591',
        //     'sender' => 'test',
        //     'mobile' => 972592418889,
        //     'type' => 0,
        //     'text' => 'Welcome to our test message'
        // ]);

        // dd($res->body());
        $admin = User::where('type', 'admin')->first();

        $admin->notify( new TestNotification() );
        // dd($admin);
    }

    public function all_notify()
    {
        return view('all_notify');
    }

    public function read_notify($id)
    {
        Auth::user()->notifications()->find($id)->markAsRead();
        // Auth::user()->notifications()->find($id)->update(['read_at' => now()]);

        return redirect()->back();
    }
}
