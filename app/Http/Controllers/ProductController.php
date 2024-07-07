<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products', compact('products'));
    }


    public function create(){
        // $product = Product::all();
            //    $id = Auth::user()->id;
            //    return $id;
            $products = Auth::user()->products;
                return view('create-product');
            }
    
    public function store(Request $request) {

        if ($request->user()->cannot('create', Product::class)) {
                abort(403);
            }
                //validation
                $request->validate([
                    'name' => 'required',
                    'price' => 'required|numeric',
                    'floor' => 'required',
                    'rooms' => 'required',
                    'description'=> 'required'
                ],
                 [
                    'name.required' => 'please add name',
                    'price.required' => 'please add monthly price',
                    'floor.required' => 'please add  which floor you want to to-lets',
                    'rooms.required' => 'please add how many rooms',
                    'description.required' => 'please add description'
                ]);
            // $user=Auth::user();
            // return $user;
            //$user = User::find(3);
        // $product = Auth::user()->products()->create($data);
        auth()->user()->products()->create([
                    'name' => $request->name, 
                    'address' => $request->address, 
                    'video' => $request->video, 
                    'price' => $request->price,
                    'rooms' => $request->rooms, 
                    'floor' => $request->floor,
                    'description' => $request->description,
                    //'user_id'=>Auth::user()->id 
                ]);
    
                    
                // $product = new Product();
    
                // $product->name = $request->name;
                // $product->address = $request->address;
                // $product->image = $request->image;
                // $product->video = $request->video;
                // $product->rooms = $request->rooms;
                // $product->price = $request->price;
                // $product->floor = $request->price;
    
            
                // $product->save();
    
                // return to_route('product');
            
    
                // if ($file = $request->file('image')) {
                
                //     $name = time() . $file->getClientOriginalName();
        
                //     $file->move('images', $name);
                // }
            return ('ok'); 
            }
}
