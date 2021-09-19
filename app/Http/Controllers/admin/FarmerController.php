<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Farmer;
use App\Models\Market;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FarmerController extends Controller
{

    public function index()
    {

        $allfarmer = Farmer::select('farmer.*')->paginate(50);

        return view('admin.farmer.index', compact('allfarmer'));

    }

    public function edit(Request $request)
    {

        $data_ = [
            'title' => "Çifti Ekle/Düzenle",
        ];

        $data_['farmeredit'] = new Farmer();

        if ($request->input('id')) {
            $data_['farmeredit'] = Farmer::findOrFail($request->input('id'));
        }

        return view('admin.farmer.edit', $data_);

    }

    public function save(Request $request)
    {

        $farmersave = Farmer::updateOrCreate(
            ['id' => $request->id],
            [
                'far_name' => $request->far_name,
                'far_surname' => $request->far_surname,
                'password' => Hash::make($request->password),
                'far_phonenumber' => $request->far_phonenumber,
                'far_email' => $request->far_email,
                'far_location' => $request->far_location,
                'far_status' => $request->far_status

            ]
        );

        return redirect()->route('admin.farmer', compact('farmersave'))
            ->with('mesaj', 'İşleminiz Başarıyla Gerçekleşmiştir')
            ->with('mesaj_tur', 'success');

    }

    public function delete(Request $request)
    {

        $location = Farmer::findOrFail($request->get('id'));
        $location->far_status = 'p';
        $location->save();

        return redirect()->route('admin.farmer');
    }
}
