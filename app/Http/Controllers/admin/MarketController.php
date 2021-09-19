<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Farmer;
use App\Models\Market;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MarketController extends Controller
{
    public function index()
    {

        $market = Market::select('market.*')->paginate();

        return view('admin.market.index', compact('market'));
    }

    public function edit(Request $request)
    {

        $data_ = [
            'title' => "Market Ekle/Düzenle",
        ];

        $data_['marketedit'] = new Market();

        if ($request->input('id')) {
            $data_['marketedit'] = Market::findOrFail($request->input('id'));
        }

        return view('admin.market.edit', $data_);

    }

    public function save(Request $request)
    {

        $marketsave = Market::updateOrCreate(
            ['id' => $request->id],
            [
                'mar_name' => $request->mar_name,
                'mar_surname' => $request->mar_surname,
                'mar_company' => $request->mar_company,
                'mar_password' => Hash::make($request->mar_password),
                'mar_phonenumber' => $request->mar_phonenumber,
                'mar_email' => $request->mar_email,
                'mar_location' => $request->mar_location,
                'mar_status' => $request->mar_status

            ]
        );

        return redirect()->route('admin.market', compact('marketsave'))
            ->with('mesaj', 'İşleminiz Başarıyla Gerçekleşmiştir')
            ->with('mesaj_tur', 'success');

    }

    public function delete(Request $request)
    {

        $location = Market::findOrFail($request->get('id'));
        $location->mar_status = 'p';
        $location->save();

        return redirect()->route('admin.market');
    }

}
