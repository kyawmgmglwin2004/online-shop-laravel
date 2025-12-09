<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\MOdels\Order;
use App\MOdels\User;
use Carbon\Carbon;
use League\CommonMark\Node\Query\OrExpr;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        if (!session()->has('show_user_badge')) {
       
        session(['show_user_badge' => true]);
    } else {
        
        session(['show_user_badge' => false]);
    }

        $product = Product::all();
        $category = Category::all();
        $order = Order::all();
        $user = User::all();
        $recentOrder = Order::latest()->take(3)->get();
    //    $newUser = User::whereDate('created_at', Carbon::today())->count();
        // $newUser = User::where('created_at','>=', Carbon::now()->subMinute(5))->count();
        $newUser = User::where('is_seen', false)->count();
        $newOrder = Order::where('is_seen', false)->count();
        return view('admin.dashboard',[
            'product'=>$product,
            'category'=>$category,
            'order'=>$order,
            'user'=>$user,
            'recentOrder' => $recentOrder,
            'newUser' => $newUser,
            'newOrder' => $newOrder
        ]);
    }
}
