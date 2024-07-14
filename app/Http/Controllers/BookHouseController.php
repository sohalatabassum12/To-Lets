<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Mail\HouseBookedMail;
use Illuminate\Support\Facades\Mail;

class BookHouseController extends Controller
{
    public function status(Product $product) {
        
        // $product->status = Product::pending;
        // $product->save();
        $product->update([
            'status' => Product::pending
        ]);



        Mail::to($product->user)->send(new HouseBookedMail());

        return back();
    }
}
