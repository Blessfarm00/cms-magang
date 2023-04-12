<?php

namespace App\Http\Controllers;

use App\Services\Gateway;
use Illuminate\Http\Request;
use \Yajra\DataTables\DataTables;
use Auth;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function index(){
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        // dd($gateway);

        $response = $gateway->get('https://kedairona.000webhostapp.com/api/cms/listUser');
        $body = $response->getData()->data;
        // dd($inventoris);

        return view('pages.Administrator.User.index',  ['users'=>$body]);
    }

    // public function create()
    // {
    //     $gateway = new Gateway();
    //     $gateway->setHeaders([
    //         'Authorization' => 'Bearer ' . Session::get('auth')->token,
    //         'Accept' => 'application/json',
    //     ]);
    //     $data = $gateway->get('https://kedairona.000webhostapp.com/api/cms/listUser', [
    //         'page' => 1,
    //         'per_page' => 999,
    //         'limit' => 999,
    //     ])->getData();
    //     return view('pages.Administrator.User.create')->with('users', $data);
    // }

    public function store(Request $request)
    {

        $this->validate($request, [
            'nama_user' => 'required|max:50|min:5',
            'email' => 'required|max:50|min:5',
            'password' => 'required|alphaNum|min:5',
            'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'no_hp' => 'required|numeric|max:13',
            'posisi' => 'required',
            'role_id' => 'required',
        ]);


        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $store = $gateway->post('https://kedairona.000webhostapp.com/api/cms/user/', [
            "nama_user" => $request->get('nama_user'),
            "email" => $request->get('email'),
            "password" => $request->get('password'),
            "avatar" => $request->get('avatar'),
            "no_hp" => $request->get('no_hp'),
            "posisi" => $request->get('posisi'),
        ])->getData();

        return redirect('/user')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $user = $gateway->get('https://kedairona.000webhostapp.com/api/cms/user/' . $id)->getData();
        // dd($user);
        return view('pages.Administrator.User.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $store = $gateway->post('https://kedairona.000webhostapp.com/api/cms/user/update/' . $id, [
            "nama_user" => $request->get('nama_user'),
            "email" => $request->get('email'),
            "password" => $request->get('password'),
            "avatar" => $request->get('avatar'),
            "no_hp" => $request->get('no_hp'),
            "posisi" => $request->get('posisi'),
        ])->getData();
        // dd($store);
        return redirect('/user')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function delete($id)
    {
            $gateway = new Gateway();
            $gateway->setHeaders([
                'Authorization' => 'Bearer ' . Session::get('auth')->token,
                'Accept' => 'application/json',
            ]);
            $response = $gateway->post('https://kedairona.000webhostapp.com/api/cms/user/delete/' . $id);

            if ($response->getStatusCode() == 200) {
                return redirect('/user')->with('success', 'User Deleted');
            } else {
                return redirect('/user')->with('error', 'Unable to delete user');
            } 
    }



} 

