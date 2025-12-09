<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use WeakMap;


class OrderController extends Controller
{
    public function buy($id)
    {
        $product = Product::find($id);
        $user = Auth::user();
            return view('order.deail', [
            'product' => $product,
            'user' => $user

        ]);   
    }
    public function order($id)
    {
        $validator = validator(request()->all(), [
            'product_id'=> 'required',
            'email'=> 'required',
            'phone'=> 'required',
            'delivery'=> 'required',
            'country'=> 'required',
            'firstName'=> 'required',
            'lastName'=> 'required',
            'address'=> 'required',
            'township'=> 'required',
            'city'=> 'required',
        ]);
        if($validator->fails()){
            return back()->with('info', 'Please complete all input!');
        }
        $product = Product::find($id);
        
 
      if($product->stock >= 1){
        $order = new Order;
        $order->product_id = request()->product_id;
        $order->email =  request()->email;
        $order->phone =   request()->phone;
        $order->delivery= request()->delivery;
        $order->country = request()->country;
        $order->firstName = request()->firstName;
        $order->lastName = request()->lastName;
        $order->address  = request()->address;
        $order->township = request()->township;
        $order->city     = request()->city;
        $order->save();

       $product->decrement('stock');
        $product->save();

        return redirect("/products/show/$order->product_id")->with('info', 'Order Successfully. We will contact you for payment and comform order. Thank You!');
      }
      
      return redirect("/products/show/$product->id")->with('error', 'Out of stock. So order no success! Thank You!');
     }

     public function list() {
        $orders = Order::all();
        $product = Product::all();

        $newOrder = Order::where('is_seen', false)->get();
        foreach($newOrder as $order){
            $order->is_seen = true;
            $order->save();
    }
        return view('order.order', [
            'order'=> $orders,
            'product' => $product
        ]);
     }

     public function destroy($id)
     {
        $order = Order::find($id);
        $order->delete();
        return back()->with('delete', 'Order Delete Successfully....');
     }

     
}
