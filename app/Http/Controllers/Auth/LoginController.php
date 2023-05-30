<?php

namespace App\Http\Controllers\Auth;

use App\Services\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    private $role = [
        'email' => 'required|email|string',
        'password' => 'required|string|min:4',
    ];

    public function showLoginForm()
    {
        // $gateway = new Gateway();
        return view('layouts.auth.login');
    }

    // private function username()
    // {
    //     return 'email';
    // }

    public function authenticate(Request $request)
    {

        $gateway = new Gateway();

        $token = $gateway->post('https://apirona.cepatpilih.com/api/token', [
            'client_key' => 'clientKeyCMS',
            'secret_key' => 'secret',
        ]);

        $result = $token->getData()->data;
        // dd($result);
        $this->validate($request, [
            'email' => 'required|email|string',
            'password' => 'required|string|min:4',
        ]);
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . $result->token,
            'Accept' => 'application/json',
        ]);

        $response =  $gateway->post('https://apirona.cepatpilih.com/api/cms/login', [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ]);
        // dd($response->getData());  

        if($response->getData()->success == true){
            Session::put('auth', $response->getData()->data);

            $gatewayProfile = new Gateway();
            $gatewayProfile->setHeaders([
                'Authorization' => 'Bearer ' . Session::get('auth')->token,
                'Accept' => 'application/json',
            ]);

            $avatar = $gatewayProfile->get('https://apirona.cepatpilih.com/api/cms/profile/');
            $body = $avatar->getData()->data;

            Session::put('profile', $body);

            return redirect('dashboard');
        }

                    
        return back()->with('login_error', 'Email Atau Password Yang Anda Masukan Salah, Silahkan Cek Kembali');



        // dd($response);
       

        // $gateway = new Gateway();
        // $responsePrivileges = $gateway->get('/api/cms/auth/my-privileges')->getData();
        // Session::put('privileges', $responsePrivileges->data);
    }


    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');

        
    }

    
}
