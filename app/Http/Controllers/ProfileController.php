<?php

namespace App\Http\Controllers;


use App\Services\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
// use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);

        $response = $gateway->get('https://kedairona.000webhostapp.com/api/cms/profile/');
        $body = $response->getData()->data;
        // dd($body);
   
        Session::put('profile', $body);

        return view('pages.Administrator.Profile.index',  ['profiles' => $body]);
    }

    public function edit($id)
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $profile = $gateway->get('https://kedairona.000webhostapp.com/api/cms/profile/')->getData();

        return view('pages.Administrator.Profile.edit', compact('profile'));

    }

    public function update(Request $request, $id)
    {
        $nama_file = '';
        if ($request->file('avatar')) {
            $file = $request->file('avatar');
            //mengambil nama file
            $nama_file = asset('img/profile') . '/' . $file->getClientOriginalName();

            //memindahkan file ke folder tujuan
            $file->move('img/profile', $file->getClientOriginalName());
        }

        // dd($request->all());
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        // dd($gateway);
        $storeProfile = $gateway->post('https://kedairona.000webhostapp.com/api/cms/profile/update/' . $id ,[
            "nama_user" => $request->get('nama_user'),
            "email" => $request->get('email'),
            "avatar" => $nama_file,
            "no_hp" => $request->get('no_hp'),
            "posisi" => $request->get('posisi'),
            "role" => $request->get('role'),
        ])->getData();


        // dd($storeProfile);
        return redirect('/profile')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama_user' => 'required|max:50|min:5',
            'email' => 'required|max:50|min:5',
            'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'no_hp' => 'required|numeric|max:13',
            'posisi' => 'required',
            'role' => 'required',
        ]);

        $path = $request->file('gambar_kuliner')->store('public/images');
        $file = $request->file('avatar');
        //mengambil nama file
        $nama_file = asset('img/profile') . '/' . $file->getClientOriginalName();

        //memindahkan file ke folder tujuan
        $file->move('img/profile', $file->getClientOriginalName());
        dd($request);
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        // dd($gateway);
        $Profile = $gateway->post('https://kedairona.000webhostapp.com/api/cms/profile' , [
            "nama_user" => $request->get('nama_user'),
            "email" => $request->get('email'),
            // "avatar" => $nama_file,
            "no_hp" => $request->get('no_hp'),
            "posisi" => $request->get('posisi'),
            "role" => $request->get('role'),

        ])->getData();

        return redirect('/profile')->with('success', 'Data Berhasil Di Tambahkan');
    }

   

    

}