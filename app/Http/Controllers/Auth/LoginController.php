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

        $token = $gateway->post('https://kedairona.000webhostapp.com/api/token', [
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

        $response =  $gateway->post('https://kedairona.000webhostapp.com/api/cms/login', [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ]);

        // dd($response);
        Session::put('auth', $response->getData()->data);
        return view('pages.dashboard');

        // $gateway = new Gateway();
        // $responsePrivileges = $gateway->get('/api/cms/auth/my-privileges')->getData();
        // Session::put('privileges', $responsePrivileges->data);
    }

    public function register(Request $request)
    {
        $gateway = new Gateway();
        $response = $gateway->Post('register', $request->only('name', 'email', 'password'));

        return response()->json($response, $response['code']);
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();

        return redirect('/login');
    }
}
