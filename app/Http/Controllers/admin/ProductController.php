<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Farmer;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $product = Product::select('product.*')->paginate();
        /*$categoryproduct = Category::select('category.*')->paginate();
        $farmerproduct = Farmer::select('farmer.*')->paginate();*/

        /*->where('employees.first_name', $request->first_name)*/

        $imageupload = Product::all();

        $productlist = Product::select('product.*')
            ->join('farmer', 'product.farmer_id', '=', 'farmer.id')
            ->join('category', 'product.category_wayid', '=', 'category.id')
            ->select('category.*', 'category.category_name', 'farmer.*', 'farmer.far_name', 'product.*')
            ->paginate();


        /*$categoryproduct = Category::select('category.*')
            ->join('product', "category.id", "=", "product.category_id")
            ->select('category.*')
            ->paginate();

        $farmerproduct = Farmer::select('farmer.*')
            ->join('product', "farmer.id", "=", "product.farmer_id")
            ->select('farmer.*')
            ->paginate();*/

        return view('admin.product.index', compact('product', 'productlist', 'imageupload'));

    }


    public function edit(Request $request)
    {

        $data_ = [
            'title' => "Ürün Düzenle",
        ];

        $data_['productedit'] = new Product();


        $categoryproduct = Category::select('category.*')->paginate();
        $farmerproduct = Farmer::select('farmer.*')->paginate();

        /* $categoryproduct = Category::select('category.*')
             ->join('product', "category.id", "=", "product.category_id")
             ->select('category.*','category.category_name')
             ->paginate();

         $farmerproduct = Farmer::select('farmer.*')
             ->join('product', "farmer.id", "=", "product.farmer_id")
             ->select('farmer.*','farmer.far_name')
             ->paginate();*/

        if ($request->input('id')) {
            $data_['productedit'] = Product::findOrFail($request->input('id'));
        }

        return view('admin.product.edit', $data_, compact('categoryproduct', 'farmerproduct'));

    }

    public function save(Request $request)
    {

        $request->validate([
            'filenames.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);

        if ($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path('/img/'), $name);
                $files[] = $name;
            }
            /*TODO: burada dosya yoluna kaydolan eski resimleri silemedim*/
            $file = new Product();

            $productsaveimage = Product::updateOrCreate(
                ['id' => $request->id],
                [
                    'image_path' => $file->filenames = json_encode($files)
                ]
            );

            return redirect()->route('admin.product', compact('productsaveimage', 'files',))
                ->with('mesaj', 'İşleminiz Başarıyla Gerçekleşmiştir')
                ->with('mesaj_tur', 'success');

        }else{

            $productsave = Product::updateOrCreate(
                ['id' => $request->id],
                [
                    'category_wayid' => $request->category_wayid,
                    'farmer_id' => $request->farmer_id,
                    'prod_name' => $request->prod_name,
                    'prod_price' => $request->prod_price,
                    'prod_quantity' => $request->prod_quantity,
                    'status' => $request->status,
                    'product_desc' => $request->product_desc

                ]
            );

            return redirect()->route('admin.product', compact('productsave'))
                ->with('mesaj', 'İşleminiz Başarıyla Gerçekleşmiştir')
                ->with('mesaj_tur', 'success');

        }

    }

    public function delete(Request $request)
    {

        $location = Product::findOrFail($request->get('id'));
        $location->prod_status = 'p';
        $location->save();

        return redirect()->route('admin.product');
    }
}
