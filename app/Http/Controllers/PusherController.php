<?php

namespace App\Http\Controllers;

use App\Events\PusherBroadcast;
use App\Models\message;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PusherController extends Controller
{
    public function getMessage($id)
    {
        $messages = message::where('id', $id)->get();
        return response()->json($messages);
    }

    public function broadcast(Request $request)
    {        
        // dd($request->all());
        $request->validate([
            'message' => 'required|string|max:5000',
        ]);

        $message = new message();
        $message->user_id = Auth::user()->id;
        $message->content = $request->message;
        $message->save();

        return redirect()->back()->with("status", "Thêm thành công!");
    }

    public function receive(Request $request): View
    {
        return view('chat-receive   ', ['message' => $request->get('message')]);
    }
}