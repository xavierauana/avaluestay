<?php

namespace avaluestay\Http\Controllers;

use Illuminate\Http\Request;

use avaluestay\Http\Requests;
use avaluestay\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class SocketController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index()
    {
        return view('socket');
    }
    public function writemessage()
    {
        return view('writemessage');
    }
    public function sendMessage(){
        $redis = Redis::connection();
        $redis->publish('message', Request::input('message'));
        return redirect('writemessage');
    }
}
}
