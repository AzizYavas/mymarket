<?php

namespace App\Http\Controllers;

use App\Mail\FarmerRegisterMail;
use App\Mail\MarketRegisterMail;
use App\Models\Admin;
use App\Models\Farmer;
use App\Models\FarmerDetay;
use App\Models\FarmerModel;
use App\Models\Market;
use App\Models\MarketDetay;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class UserController extends Controller
{
    public function __construct()
    {

        /*        TODO:ADMİNDE GİRİŞ YAPINCA ARA YÜZDE GİRİŞ YAPAMIYORUM*/

        $this->middleware('guest')->except('signout');
        $this->middleware('guest:farmer')->except('farmerout', 'activate');
        $this->middleware('guest:market')->except('marketout', 'marketactivate');
        /*        $this->middleware('guest:writer')->except('logout');*/
    }


    public function loginmarket_form()
    {

        return view('user.loginmarketform');
    }


    public function loginmarket(Request $request)
    {


        $cretendial = $request->validate([
            'mar_name' => ['required'],
            'password' => ['required'],
        ]);

        //bu alttaki yöntemi kullnında market girmedi farmer girdi
        /*        ['mar_name' => $request->input('mar_name'), 'password' => $request->input(Hash::make('password'))]*/

        if (auth()->guard('market')->attempt($cretendial)) {
            auth()->guard('market')->user();
            request()->session()->regenerate();
            return redirect()->intended('/')->with('market', $cretendial);

        } else {
            $errors = ['mar_name' => "Hatalı Giriş"];
            return back()->withErrors($errors);
        }
    }


    public function marketout()
    {
        auth()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('homepage')
            ->with('mesaj', '!!!!! Çıkış Yapıldı !!!!')
            ->with('mesaj_tur', 'danger');
    }

    public function registermarket_form()
    {

        return view('user.registermarketform');
    }


    public function registermarket_save()
    {

        $market = Market::create([
            'mar_name' => request('mar_name'),
            'mar_surname' => request('mar_surname'),
            'mar_company' => request('mar_company'),
            'password' => Hash::make(request('password')),
            'mar_phonenumber' => request('mar_phonenumber'),
            'mar_email' => request('mar_email'),
            'mar_location' => request('mar_location'),
            'mar_status' => "a",
            'activation_key' => Str::random(60),
            'active' => 0,
        ]);

        $market->marketdetay()->save(new MarketDetay());

        Mail::to(request('mar_email'))->send(new MarketRegisterMail($market));

        auth()->login($market);

        return redirect()->route('homepage')
            ->with('mesaj', 'Kaydınız Başarıyla Yapıldı Mail Adresinizden Hesabınızı Aktive ediniz')
            ->with('mesaj_tur', 'success');
        /*
        return redirect()->route('user.loginmarketform')
            ->with('mesaj', 'Kaydınız Başarıyla Gerçekleşmiştir')
            ->with('mesaj_tur', 'success');*/
    }


    public function marketactivate($marketkey)
    {

        $market = Market::where('activation_key', $marketkey)->first();

        if (!is_null($market)) {
            $market->activation_key = null;
            $market->active = 1;
            $market->save();
            return redirect()->to('/')
                ->with('mesaj', 'Kullanıcı Kaydınız Aktifleştirildi')
                ->with('mesaj_tur', 'success');
        } else {
            return redirect()->to('/')
                ->with('mesaj', 'Aktivasyon anahtari geçersizdir')
                ->with('mesaj_tur', 'danger');
        }
    }


    /*    <==================================================================>*/


    public function loginfarmer_form()
    {

        return view('user.loginfarmerform');

    }


    public function loginfarmer(Request $request)
    {

        $request->validate([
            'far_name' => ['required'],
            'password' => ['required']
        ]);

        if (auth()->guard('farmer')->attempt(['far_name' => $request->input('far_name'), 'password' => $request->input(Hash::make('password'))])) {
            auth()->guard('farmer')->user();
            request()->session()->regenerate();
            return redirect()->intended('/')->with('farmer', ['far_name' => $request->input('far_name'), 'password' => $request->input(Hash::make('password'))]);

        } else {
            $errors = ['far_name' => "Hatalı Giriş"];
            return back()->withErrors($errors);
        }
    }


    public function registerfarmer_form(Request $request)
    {

        $data_['farmeredit'] = new FarmerModel();

        if ($request->input('id')) {
            $data_['registerfarmeredit'] = FarmerModel::findOrFail($request->input('id'));
        }

        return view('user.registerfarmerform', $data_);
    }


    public function registerfarmer_save(Request $request)
    {

        $farmer = FarmerModel::updateOrCreate([
            ['id' => $request->id],
            [
                'far_name' => $request->far_name,
                'far_surname' => $request->far_surname,
                'password' => Hash::make($request->password),
                'far_phonenumber' => $request->far_phonenumber,
                'far_email' => $request->far_email,
                'far_location' => $request->far_location,
                'far_status' => "a",
                /* 'activation_key' => Str::random(60),
                 'active' => 0,*/

            ],
            'activation_key' => Str::random(60),
            'active' => 0,

        ]);

        $farmer->detay()->save(new FarmerDetay());

        Mail::to(request('far_email'))->send(new FarmerRegisterMail($farmer));

        auth()->login($farmer);

        return redirect()->route('homepage')
            ->with('mesaj', 'Kaydınız Başarıyla Yapıldı Hesabınızı Aktive ediniz')
            ->with('mesaj_tur', 'success');

    }

    /*    public function farmerupdateform(Request $request)
        {

            $data_['farmerupdateform'] = new FarmerModel();

            if ($request->input('id')) {
                $data_['farmerupdateform'] = FarmerModel::findOrFail($request->input('id'));
            }

            return view('user.farmerupdateform', $data_);

        }

        public function farmerupdate(Request $request)
        {

            $farmerupdate = FarmerModel::update($request->all());

            return redirect()->route('homepage', compact('farmerupdate'))
                ->with('mesaj', 'Kaydınız Başarıyla Yapıldı Hesabınızı Aktive ediniz')
                ->with('mesaj_tur', 'success');


        }*/


    public function activate($farmkey)
    {

        $farmer = Farmer::where('activation_key', $farmkey)->first();

        if (!is_null($farmer)) {
            $farmer->activation_key = null;
            $farmer->active = 1;
            $farmer->save();
            return redirect()->to('/')
                ->with('mesaj', 'Kullanıcı Kaydınız Aktifleştirildi')
                ->with('mesaj_tur', 'success');
        } else {
            return redirect()->to('/')
                ->with('mesaj', 'Aktivasyon anahtari geçersizdir')
                ->with('mesaj_tur', 'danger');
        }
    }


    public function farmerout()
    {

        auth()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('homepage')
            ->with('mesaj', '!!!!! Çıkış Yapıldı !!!!')
            ->with('mesaj_tur', 'danger');
    }


}
