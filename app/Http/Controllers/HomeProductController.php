<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Farmer;
use App\Models\Category;
use App\Models\FarmerModel;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class HomeProductController extends Controller
{
    public function index($slug_product)
    {

        $allproduct = Product::whereSlug($slug_product)->firstOrFail();
        $categorypro = $allproduct->procategory()->distinct()->get();

        $imageupload = Product::all();

        $productfarmer = FarmerModel::all();

        /* $productfarmer = Product::select('product.*')
             ->join('farmer', 'product.farmer_id', '=', 'farmer.id')
             ->where('product.farmer_id','=','farmer.id')
             ->paginate();*/


        return view('product', compact('allproduct', 'categorypro', 'imageupload', 'productfarmer'));

    }

    public function farmerproduct()
    {

        $homeproductlist = Product::select('product.*')
            ->join('farmer', 'product.farmer_id', '=', 'farmer.id')
            ->join('category', 'product.category_wayid', '=', 'category.id')
            ->select('category.*', 'category.category_name', 'farmer.*', 'farmer.far_name', 'product.*')
            ->paginate();

        $farmerproductimage = Product::all();


        return view('farmerproduct', compact('homeproductlist', 'farmerproductimage'));


    }

    public function farmerproductedit(Request $request)
    {

        $data_ = [
            'title' => "Ürün Düzenle Ve Ekle",
        ];

        $data_['farmerproductedit'] = new Product();


        $categoryproduct = Category::select('category.*')->paginate();
        $farmerproduct = FarmerModel::select('farmer.*')->paginate();


        if ($request->input('id')) {
            $data_['farmerproductedit'] = Product::findOrFail($request->input('id'));
        }

        return view('farmerproductedit', $data_, compact('categoryproduct', 'farmerproduct'));


    }


}
