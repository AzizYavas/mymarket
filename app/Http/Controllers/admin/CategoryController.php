<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {

        //Alt Kategoriler
        $subcategory = Category::select('category.*')->paginate(50);

        //ana kategoriler
        $category = Category::where('top_id', null)->paginate();

        return view('admin.category.index', compact('category', 'subcategory'));
    }


    public function edit(Request $request)
    {

        $data_ = [
            'title' => "Kategori Ekle/Düzenle",
        ];

        $data_['categoryedit'] = new Category();

        if ($request->input('id')) {
            $data_['categoryedit'] = Category::findOrFail($request->input('id'));
        }

        $subcategory = Category::select('category.*')->where('top_id', $request->input('id'))->paginate();

        return view('admin.category.edit', $data_, compact('subcategory'));
    }

    public function save(Request $request)
    {

        $categorysave = Category::updateOrCreate(
            ['id' => $request->id],
            [
                'category_name' => $request->category_name,
                'slug' => $request->category_name,
                'status' => $request->status
            ]
        );

        return redirect()->route('admin.category', compact('categorysave'))
            ->with('mesaj', 'İşleminiz Başarıyla Gerçekleşmiştir')
            ->with('mesaj_tur', 'success');

    }

    public function subedit(Request $request)
    {

        $data_ = [
            'title' => "Alt Kategori Ekle/Düzenle",
        ];

        $data_['subcategoryedit'] = new Category();

        if ($request->input('id')) {
            $data_['subcategoryedit'] = Category::findOrFail($request->input('id'));
        }

        //$subeditcategory = Category::where('top_id', $request->input('id'))->paginate();

        $denemekanka = Category::all()->where('top_id', $request->input('id'));

        return view('admin.category.subedit', $data_, compact('denemekanka'));
    }

    public function subsave(Request $request)
    {

        foreach ($request->input("category_name") as $key=>$value)
        {
            $categorysave = Category::updateOrCreate(
                ['id' => $key],
                [
                    'category_name' => $value,
                    'slug' => $value,
                    'status' => 'a'
                ]
            );

    }
        return redirect()->route('admin.category')
            ->with('mesaj', 'İşleminiz Başarıyla Gerçekleşmiştir')
            ->with('mesaj_tur', 'success');

    }

    public function subcategoryedit(Request $request)
    {

        $data_ = [
            'title' => "Alt Kategori Ekle",
        ];

        $data_['subcategoryedit'] = new Category();

        if ($request->input('id')) {
            $data_['subcategoryedit'] = Category::findOrFail($request->input('id'));
        }

        //$subeditcategory = Category::where('top_id', $request->input('id'))->paginate();

        $denemekanka = Category::all()->where('top_id', $request->input('id'));

        return view('admin.category.subcategoryedit', $data_, compact('denemekanka'));
    }

    public function subcategorysave(Request $request)
    {

        foreach ($request->input("sub_category") as $value)
            {
                $categorysave = Category::create(
                    [
                        'top_id' => $request->input("id"),
                        'category_name' => $value,
                        'slug' => $value,
                        'status' => 'a'
                    ]
                );
            }


        return redirect()->route('admin.category')
            ->with('mesaj', 'İşleminiz Başarıyla Gerçekleşmiştir')
            ->with('mesaj_tur', 'success');

    }

    public function delete(Request $request)
    {

        $location = Category::findOrFail($request->get('id'));
        $location->status = 'p';
        $location->save();

        return redirect()->route('admin.category');
    }


    public function subdelete(Request $request)
    {

        $subdelete = Category::where('id' ,$request->get('id'))->delete();


        return redirect()->route('admin.category');
    }
}

