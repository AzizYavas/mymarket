<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $allorder=Order::with('basket')
            ->whereHas('basket',function($query){
                $query->where('user_id',auth()->id());
            })
            ->orderByDesc('created_at')->get();
        return view('allorder',compact('allorder'));
    }

    public function detail($id)
    {
        $order=Order::with('sepet.basket_product.product')
            ->whereHas('basket',function($query){
                $query->where('user_id',auth()->id());
            })
            ->where('order.id',$id)->firstOrFail();
        return view('order',compact('order'));
    }
}
