<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Color;
use App\Models\Brand;
use App\Models\Category;
use App\Models\WareHouse;
use App\Models\Basket;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function list(){ 


    }
    public function create(){ 
      $colors=Color::all();
      $brands=Brand::all();
      $categories=Category::all();
      return view('create')->with('colors',$colors)->with('brands',$brands)->with('categories',$categories);

    }

    public function cart(){ 
      //$baskets=basket::select('*')->where('user_id', Auth::id())->get();
      $baskets=basket::query()->Join('products as p', 'p.id', '=', 'baskets.product_id')->get(['p.title','baskets.product_id']);
     
      //$products=Product::query()->Join('warehouses as ws', 'ws.product_id', '=', 'products.id')->get(['products.id','products.title','ws.count']);

      return view('cart')->with('baskets',$baskets);
    }

    public function store(Request $request){ 
        $validated_data=$request->validate([
            'title'=>'required',
          'description'=>'required'
        ]);
        $product=Product::create([
            'title'=>$validated_data['title'],
            'user_id'=>Auth::id(),
            'description'=>$validated_data['description'],
            'slug'=>$validated_data['title'],
            'color_id'=>$request->color,
            'model_id'=>1,
            'brand_id'=>$request->brand,
            'categroy_id'=>$request->category,
            
        ]);

        WareHouse::create([
           'product_id'=>$product->id,
           'count'=>$request->count
      ]);
      return redirect('admin/product/create');
    
    }
}
