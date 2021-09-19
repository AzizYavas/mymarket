<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BasketController extends Controller
{
    public function index()
    {
        $imageupload = Product::all();

        return view('basket',compact('imageupload'));
    }

    public function add()
    {
        $product = Product::find(request("id"));
        Cart::add($product->id, $product->prod_name, request('inprice'), $product->prod_price, ['slug' => $product->slug]);


        return redirect()->route('sepet.basket')
            ->with('mesaj_tur', 'success')
            ->with('mesaj', 'Ürün sepete eklendi. ');
    }

    public function basketdelete($rowid)
    {
        Cart::remove($rowid);
        return redirect()->route('sepet.basket')
            ->with('mesaj_tur', 'success')
            ->with('mesaj', 'Ürün sepetten kaldırıldı.');
    }

    public function basketunload()
    {
        Cart::destroy();
        return redirect()->route('basket')
            ->with('mesaj_tur', 'success')
            ->with('mesaj', 'Sepetiniz Boşaltıldı.');
    }

    public function update($rowid)
    {
        /*$validator = Validator::make(request()->all(), [
            'adet' => 'required|numeric|between:1,5'
        ]);

        if ($validator->fails()) {
            session()->flash('mesaj_tur', 'danger');
            session()->flash('mesaj', 'Adet değeri 1 ile 5 arasında olmalıdır');
            return response()->json(['success' => false]);
        }*/

        Cart::update($rowid, request('adet'));
        session()->flash('mesaj_tur', 'success');
        session()->flash('mesaj', 'Adet Bilgisi Güncellendi');
        return response()->json(['success' => true]);
    }

}
