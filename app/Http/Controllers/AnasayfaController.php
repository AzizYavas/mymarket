<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Farmer;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AnasayfaController extends Controller
{
    public function index(){

        $categoryall = Category::whereNull('top_id')->take(8)->get();

        /*$urunler_slider = Urun::select('urun.*')
           ->join('urun_detay', "urun_detay.urun_id", 'urun.id')
           ->where('urun_detay.goster_slider', 1)
           ->orderBy('urun.guncelleme_tarihi', 'desc')
           ->take(4)
           ->get();*/

        $product_slider = Product::select('product.*')
            ->join('producttype', "producttype.product_id", 'product.id')
            ->where('producttype.show_slider', 1)
            ->get();


        return view('homepage',compact('categoryall','product_slider'));
    }
}
