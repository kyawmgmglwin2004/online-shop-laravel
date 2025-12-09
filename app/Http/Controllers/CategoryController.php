<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category($id)
    {
        $categories = Category::find($id);
        
        return view('product.category', [
            'categories' => $categories
        ]);
        // return $categories->product;
    }    
}
