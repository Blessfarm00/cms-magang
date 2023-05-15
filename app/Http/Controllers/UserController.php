<?php

namespace App\Http\Controllers;

use App\Services\Gateway;
use Illuminate\Http\Request;
use \Yajra\DataTables\DataTables;
use Auth;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\User;
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

        $imgProfile = $gateway->get('https://kedairona.000webhostapp.com/api/cms/profile/');
        $resultImg = $imgProfile->getData()->data;

        $response = $gateway->get('https://kedairona.000webhostapp.com/api/cms/listUser');
        $body = $response->getData()->data;
        // dd($body);

        return view('pages.Administrator.User.index',  ['users'=>$body, 'imgProfile'=>$resultImg]);
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
            'role' => 'required',
        ]);

        $path = $request->file('gambar_kuliner')->store('public/images');
        $file = $request->file('avatar');
        //mengambil nama file
        $nama_file = asset('img/profile') . '/' . $file->getClientOriginalName();

        //memindahkan file ke folder tujuan
        $file->move('img/profile', $file->getClientOriginalName());

        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $store = $gateway->post('https://kedairona.000webhostapp.com/api/cms/user/', [
            "nama_user" => $request->get('nama_user'),
            "email" => $request->get('email'),
            // "password" => $request->get('password'),
            // "avatar" => $request->get('avatar'),
            "no_hp" => $request->get('no_hp'),
            "posisi" => $request->get('posisi'),
            "role" => $request->get('role'),
        ])->getData();

        return redirect('/user')->with('pesan_tambah', 'Data Berhasil Di Tambahkan');
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
        return view('pages.Administrator.User.edit', compact('user'));
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

        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        // dd($gateway);
        $storeUser = $gateway->post('https://kedairona.000webhostapp.com/api/cms/user/update/' . $id, [
            "nama_user" => $request->get('nama_user'),
            "email" => $request->get('email'),
            // "password" => $request->get('password'),
            "avatar" => $nama_file,
            "no_hp" => $request->get('no_hp'),
            "posisi" => $request->get('posisi'),
            "role" => $request->get('role'),

        ])->getData();
        // dd($storeUser);
        return redirect('/user')->with('pesan_edit', 'Data Berhasil Di Tambahkan');
    }

    public function delete($id)
    {
        $gateway = new Gateway();
        $gateway->setHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth')->token,
            'Accept' => 'application/json',
        ]);
        $deletePengeluaran = $gateway->post('https://kedairona.000webhostapp.com/api/cms/user/delete/' . $id);

        return redirect('/user')->with('pesan_hapus', 'Data Deleted');
    }
    public function destroy(User $user)
    {

        $gateway = new Gateway();
        // $gateway->setHeaders([
        //     'Authorization' => 'Bearer ' . Session::get('auth')->token,
        //     'Accept' => 'application/json',
        // ]);
        $deletePengambilan = $gateway->post('https://kedairona.000webhostapp.com/api/user/delete/' . $user->id);

        $data = User::where('id', $user->id)->first();
        User::delete(public_path('imag/profile' . $data->id)); // corrected method call to delete file
        User::where('id', $user->id)->delete();
        return redirect()->route('user.index')->with('pesan_delete', 'Data Barang Berhasil Dihapus'); // corrected method call to set success message
    }
} 

