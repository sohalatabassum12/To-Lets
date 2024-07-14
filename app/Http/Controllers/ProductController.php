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


    public function create(){;
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
            
        


        
        if ($file = $request->file('image')) {
           
            $image_name = time() . $file->getClientOriginalName();
 
            $file->move('images', $image_name);
        }
        //auth()->user()->products()->create([
        Product::create([
                    'name'   => $request->name, 
                    'address'=> $request->address,
                    'image'  =>$image_name,
                    'video'  => $request->video, 
                    'price'  => $request->price,
                    'rooms'  => $request->rooms, 
                    'floor'  => $request->floor,
                    'description' => $request->description,
                    'user_id'=>Auth::user()->id 
        ]);
                return redirect()->route('product.list'); 
            }
            
            public function edit($id,Product $product)
            {
                $product = Product::findOrFail($id);

                return view('edit-product', compact('product'));
            }


    public function update($id, Request $request)
    {
        $product = Product::findOrFail($id);
        
        if ($file = $request->file('image')) {
           
            $image_name = time() . $file->getClientOriginalName();
 
            $file->move('images', $image_name);
        }
        $product->update([
            'name' => $request->name,
            'address'=> $request->address,
            'image'  =>$image_name,
            'video'  => $request->video, 
            'rooms'  => $request->rooms, 
            'floor'  => $request->floor,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return redirect()->route('product.list');
    }
    public function delete(Product $product) {

        unlink(public_path(). '/images/' . $product->image);
        $product->delete();

        return to_route('product.list');
    }


}
