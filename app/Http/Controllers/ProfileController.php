<?php

namespace App\Http\Controllers;


use App\Services\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index()
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        // dd($gateway);

        $response = $gateway->get('https://kedairona.000webhostapp.com/api/cms/profile');
        $body = $response->getData()->data;

        // dd($body);
        return view('pages.Administrator.Profile.index',  ['profiles' => $body]);
    }

    public function edit($id)
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $pengeluaran = $gateway->get('https://kedairona.000webhostapp.com/api/cms/profile/' . $id)->getData();
        // dd($pengeluaran);
        return view('pages.Administrator.Profile.index', compact('pengeluaran'));
    }

    public function update(Request $request, $id)
    {
        $nama_file = '';
        if ($request->file('gambar_kuliner')) {
            $file = $request->file('gambar_kuliner');
            //mengambil nama file
            $nama_file = asset('img/kuliner') . '/' . $file->getClientOriginalName();

            //memindahkan file ke folder tujuan
            $file->move('img/kuliner', $file->getClientOriginalName());
        }

        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $storeProfile = $gateway->post('https://kedairona.000webhostapp.com/api/cms/profile/update/' . $id, [
            "nama_user" => $request->get('nama_user'),
            "email" => $request->get('email'),
            "avatar" => $request->get('avatar'),
            "no_hp" => $request->get('no_hp'),
            "posisi" => $request->get('posisi'),
        ])->getData();
        // dd($storePengeluaran);
        return redirect('/profile')->with('success', 'Data Berhasil Di Tambahkan');
    }

}
