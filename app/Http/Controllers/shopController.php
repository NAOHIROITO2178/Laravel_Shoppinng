<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Cart;
use Illuminate\Http\Request;

class shopController extends Controller
{
    public function index()
    {
        $stocks = Stock::Paginate(6);
        return view('shop',compact('stocks'));
    }

    public function myCart() //追加
    {
        $carts = Cart::all();
        return view('mycart',compact('carts'));
    }

    public function addMyCart(Request $request)
    {
        $user_id = 1;
        $stock_id=$request->stock_id;
        $cart_add_info=Cart::firstOrCreate(['stock_id' => $stock_id,'user_id' => $user_id]);
        if($cart_add_info->wasRecentlyCreated){
            $message = '商品の追加完了！';
        }
        else{
            $message = '既にカートに入っています。';
        }
        $my_carts = Cart::where('user_id',$user_id)->get();
        return view('mycart',compact('my_carts' , 'message'));
    }

    public function deleteCart(Request $request, Cart $cart)
    {
        $stock_id=$request->stock_id;
        $user = auth()->user();
        $message = $cart->deleteMyCart($user->id, $stock_id);
        $my_carts = $cart->showCart();
        return view('mycart',compact('my_carts' , 'message'));
    }
}
