<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Product;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index($productId){
        $product = Product::findOrFail($productId);

        $messages = auth()->user()->sender()->get();
        return view('message', [
            'userId' => $product->user_id,
            'messages' => $messages
        ]);
    }


    public function send(Request $request){

        Message::create([
            'sender_id' => auth()->user()->id,
            'receiver_id' => $request->receiverId,
            'message' => $request->message
        ]);

        return 'ok';
    }
}
