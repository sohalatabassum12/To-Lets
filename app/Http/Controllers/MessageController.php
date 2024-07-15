<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Product;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index($productId){
        $product = Product::findOrFail($productId);

        $senderMessages = auth()->user()->sender()->where('product_id', $productId)->get();
        $receiverMessages = auth()->user()->reciever()->where('product_id', $productId)->get();

        $messages = Message::where('product_id', $productId)->get();

        return view('message', [
            'userId' => $product->user_id,
            'senderMessages' => $senderMessages,
            'receiverMessages' => $receiverMessages,
            'productId' => $product->id,
            'messages' => $messages,
        ]);
    }


    public function send(Request $request){

       $receiverMessages = auth()->user()->reciever()->where('product_id', $request->productId)->orderBy('id', 'desc')->first();

       $product = Product::findOrFail($request->productId);
        
        if ($product->user_id == auth()->user()->id) {
            Message::create([
                'sender_id' => auth()->user()->id,
                'receiver_id' => $receiverMessages->sender_id,
                'sender_message' => $request->message,
                'product_id' => $request->productId
            ]);
        }else{
            Message::create([
                'sender_id' => auth()->user()->id,
                'receiver_id' => $request->receiverId,
                'sender_message' => $request->message,
                'product_id' => $request->productId
            ]);
        }
        

        return back();
    }

    //sender message
    //product id
    //receiver message
}
