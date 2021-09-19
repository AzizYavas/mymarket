<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeCategoryController extends Controller
{
    public function index($category_slug)
    {

        $categoryallslug = Category::where('slug', $category_slug)->firstOrFail();

        $subcategory = Category::where("top_id", $categoryallslug->id)->get();

        $productcategory = $categoryallslug->prodcategory()->paginate(2);

        $imagecategory = Product::all();


        //dd($categoryallslug->prodcategory());

        /* $productlist = Product::select('product.*')
             ->join('farmer', 'product.farmer_id', '=', 'farmer.id')
             ->join('category', 'product.category_id', '=', 'category.id')
             ->select('category.*', 'category.category_name', 'farmer.*', 'farmer.far_name', 'product.*')
             ->paginate();*/


        return view('category', compact('categoryallslug','subcategory','productcategory','imagecategory'));

    }
}
