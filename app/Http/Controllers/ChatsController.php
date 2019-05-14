<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    
    public function __construct()
{
  $this->middleware('auth');
}

/**
 * Show chats
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
  return view('chat');
}

/**
 * Fetch all messages
 *
 * @return Message
 */
public function fetchMess()
{
  return Message::with('user')->get();
  
}
    
    /*
 * Persist message to database
 *
 * @param  Request $request
 * @return Response
 */
 public function sendMess(Request $request){
  $user = Auth::user();

  $message = $user->messages()->create([
    'message' => request()->input('message')
    //'message' => $request->input('message')  //'message' => request()->test
  ]);
  
  broadcast(new MessageSent($user, $message))->toOthers();
 // return ['status' => 'Message Sent!'];
}
}


//, 'message' => "$message[message]", 'request'=>"$request", 'user' => "$user"];