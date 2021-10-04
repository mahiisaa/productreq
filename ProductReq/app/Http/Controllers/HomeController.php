<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\WareHouse;
use App\Models\Demand;
use App\Models\Basket;
use Illuminate\Support\Facades\Auth;

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
         $basketCount=Basket::select('*')->where('user_id','=',Auth::id())->get()->count();
         $products=Product::query()->Join('warehouses as ws', 'ws.product_id', '=', 'products.id')->get(['products.id','products.title','ws.count']);
  
        // $warehousecount=Product::count();
     
        
        return view('home')->with('products',$products)->with('basketcount',$basketCount);
    }

    public function show()
    {   $products=Product::all();
        return view('homepage',['products'=>$products]);
    }
    public function submitReq(Request $request){
        $basket=Basket::create([
            'product_id'=>$request->productID,
            'user_id'=>Auth::id()
        ]);


        return redirect('/home');    
    }
}
