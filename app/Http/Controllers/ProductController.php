<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Kernel;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    // public function __construct()
    // {
    //     // $this->middleware( 'admin');
    //     // $this->middleware('can:manage-products')->except(['index', 'show']);
    //     $this->middleware('admin')->except(['index']);
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Product::latest()->paginate(5);
        $products = Product::all();
        return view('product.index', [
            'products' => $products
        ]);
        // return "Success";
        
    }

//     /**
//      * Show the form for creating a new resource.
//      */
    public function create()
    {
        if(Gate::allows('product-create')) {

             $validator = validator(request()->all(), [
            'name'=> 'required',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'required'

        ]);
         if($validator->fails()) {
            return back()->with('info', 'No perfect');
        }
        $product = new Product;
        $product->name = request()->name;
        $product->price =request()->price;
        $product->description = request()->description;
        $product->stock = request()->stock;
        $product->category_id = request()->category_id;
        // $product->image = request()->image;
        if(request()->file('image')) {
            $imagePath = request()->file('image')->store('products_images', 'public');
            $product->image = $imagePath;
        } else {
            $product->image = null; // or set a default image path
        }
        $product->save();
        
        return redirect('/products');
        }else{
            return back()->with('error', 'Unauthorized');
        }

    }

    public function addForm()
    {
        return view('product.create');
    }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      */
    public function show($id)
    {
        $products = Product::find($id);

        return view('product.show', [
            'product'=> $products
        ]);
    }    

//     /**
//      * Show the form for editing the specified resource.
//      */
    public function edit($id)
    {
        $data = Product::find($id);

      return view('product.edit', [
        'data' => $data
      ]);

    }

//     /**
//      * Update the specified resource in storage.
//      */
    public function update($id)
    {
       if(Gate::allows('product-edit')){
          $validator = validator(request()->all(), [
            'name'=> 'required',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'

        ]);
         if($validator->fails()) {
            return back()->with('info', 'Please complete following input!');
        }
        $product = Product::find($id);
        $product->name = request()->name;
        $product->price =request()->price;
        $product->description = request()->description;
        $product->stock = request()->stock;
        $product->category_id = request()->category_id;
        
       if(request()->file('image')) {
        $imagePath = request()->file('image')->store('products_images', 'public');
        $product->image = $imagePath;
       } else {
        $product->image = null;
       }
        
        $product->save();
        
        return redirect('/products');
       }else {
        return back()->with('error', 'Unauthorized');
       }

    }

//     /**
//      * Remove the specified resource from storage.
//      */
    public function destroy(string $id)
    {
        if(Gate::allows('product-delete')){
             $product = Product::find($id);
        $product->delete();
        // $product->save();
        return back()->with('info', 'Delete Product Success');
        }else{
            return back()->with('error', 'Unauthorzited');
        }
    
    }

    

 }
